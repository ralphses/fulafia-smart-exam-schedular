<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\ExamCenters;
use App\Models\Models\Center;
use App\Models\Models\Exam;
use App\Models\Models\ExamDay;
use App\Models\Models\ExamUnit;
use App\Models\Models\Schedule;
use App\Models\Models\VenueCourseStudent;
use App\Models\TimeSlot;
use App\Models\TImeTable;
use App\Utilities\Utility;
use DateTime;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection as Collections;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $school = Auth::user()->school;

        $centers = $school->examCenters;
        $faculties = $school->faculties;
        $depts = Department::whereIn('faculty_id', $faculties->map(function($faculty) {return $faculty->id;}))->get();
        $courses = Course::whereIn('department_id', $depts->map(function ($dep) { return $dep->id;}))->get();

        $timeslots = $school->timeSlots;

        $info = [
            'center' => $centers,
            'faculty' => $faculties,
            'department' => $depts,
            'course' => $courses,
            'timeSlot' => $timeslots
        ];

        return view('timetable-generate', ['info' => $info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function store(Request $request): Response
    {
//        $request->dd();

        //Get all Exam days
        $examDates = $this->getExamDates($request->get('date_start'), $request->get('date_stop'));

        //Get allowed days of the week
        $allowedDays = ($request->get('exam-days') === 'all-days') ? Utility::ALLOWED_DAYS : $request->get('exam-days');

        //Filter out not allowed days from the dates
        $examDays = $this->filterAllowedDates($examDates, $allowedDays);

        //Get Available centers
        $centers = $this->getAvailableCenters($request->get('center'));

        //Get Selected Courses
        $courses = $this->getCourses($request);

        //Sort courses by number of students or general courses first (if selected)
        $courses = ($request->get('level-sort') === "Yes") ?
            $this->generalCoursesFirst($courses) :
            $this->sortCoursesByStudents($courses);

        //Sort exam centers according to capcity
        $centers = $this->sortCentersByCapacity($centers);

        //Todo: Check if general first,
        //      Sort by general first
        //      Else
        //      Proceed
        //Todo: Generate Exam days

        //Get School Name
        $schoolName = Auth::user()->school->name;

        //Get Semester
        $semester = strtoupper($request->get('semester')) . ' SEMESTER';

        //Get Session
        $session = $request->get('session');

        //Get exam start and stop date
        $start = date('l, Y-M-d', strtotime($request->get('date_start')));
        $stop = date('l, Y-M-d', strtotime($request->get('date_stop')));

        //Set planner name
        $planner = $request->get('planning-officer');

        //Get Instructions
        $instructions = preg_split('/\r\n/', $request->get('instructions'));

        //Get no of maximum number of courses per exam
        $noOfCoursesPerExam = $request->get('no-course-exam');

        //Get selected Timeslots
        $timeSlots = TimeSlot::whereIn('id', $request->get('time-slots'))
            ->get()
            ->map(function ($timeSLot) { return $timeSLot->name; })
            ->all();

        //Create a new Timetable
        $timeTable = new TImeTable(
            [
                'instructions' => $instructions,
                'exam_days' => implode('|', $allowedDays),
                'planner' => $planner,
                'stop_date' => $stop,
                'start_date' => $start,
                'session' => $session,
                'semester' => $semester,
                'school_name' => $schoolName,
                'school_id' => Auth::user()->school->id
            ]
        );

        //Set timetable timeslots
        $timeTable->setTimeSlots($timeSlots);

        //Build exam days for timetable
        $buildResult = $this->buildExamDays($courses, $centers, $timeTable, $examDays, $noOfCoursesPerExam);

        $processedExamDays = $buildResult['examDays'];

        $timeTable->setExamDays($this->sanitizeExamDays($processedExamDays)->all());

        $timeTable->setScheduledStudentAndCourses($buildResult['scheduledStudentAndCourses']);

        $timeTable->setUnAssignedCourses($buildResult['unAssignedCourses']);

        $timeTable->setScheduler($this->buildScheduler($timeTable));

        dd($timeTable->getScheduler());
//        dd($timeTable->getScheduledStudentAndCourses()[0]['timeSLot']);

        return response()->view('timetable-preview', ['timetable' => $timeTable]);

    }

    #[ArrayShape(['examDays' => "array", 'unAssignedCourses' => "mixed"])]
    private function buildExamDays(array $courses, array $centers, TImeTable $timeTable, array $examDays, int $noOfExamUnits): array
    {
        $allExamDays = [];
        $scheduledStudentAndCourses = [];

        $courses = collect($courses)->map(function ($course) {
            $students = $course->students->map(function ($std) {
                return $std->id;
            });
            return new \App\Models\Models\Course($course->id, $students->all(), $course->title, false, $course->general);
        }
        )->filter(function ($value) { return count($value->getStudents()) > 0;});

        $centers = collect($centers)
            ->map(function ($center) {
                $ce = new Center($center->id, $center->name, $center->capacity);
                $ce->setFilled(false);
                return $ce;
            });

        $examDays = collect($examDays);

        $dailyStudents = [];
        $checkDailyStudents = 0;

        foreach ($examDays as $examDay) {

            //Create an Exam for specific timeslot
            foreach ($timeTable->getTimeSlots() as $timeSlot) { //Exam day here

                $allCenters = collect($centers);

                Utility::$currentStudents = []; // set already filled students for this timeslot to empty
                $examUnits = []; // create array to store several exam units - venue and list of courses

                $currentRequiredSpace = 0;

                //Add Exam units to an Exam
                for ($i = 0; $i < $noOfExamUnits; $i++) {

                    $xmUnit = new ExamUnit(); // Create a new exam unit

                    $venue = $this->getCenter($allCenters, $currentRequiredSpace);

                    if(is_null($venue)) break;

                    $xmUnit->setVenue(ExamCenters::find($venue->getId()));

                    $currentCourseId = 0;

                    //Todo: Add Courses to this venue

                    do {

                        //Get a course with students not already assigned for this timeslot
                        $course = $this->nextCourse($courses, Utility::$currentStudents, $dailyStudents, $currentCourseId);

                        if (is_null($course)) break;

                        if($venue->getFreeSpace() < count($course->getStudents())) {

                            //Get another venue with required size
                            $venue = $this->getCenter($allCenters, count($course->getStudents()));

                            //Spread students across all available venues if venue with required size not available
                            if(is_null($venue)) {

                                $requiredStudents = collect($course->getStudents());
                                $requiredSpace = $requiredStudents->count();

                                while ($requiredSpace > 0) {

                                    $venue = $this->getNextAvailableCenter($allCenters, $requiredSpace);

                                    if(!$venue) {
                                        break;
                                    }

                                    //Get Students to be filled for this particular exam venue
                                    $students = $this->getStudentsRequired($requiredStudents, $venue->getFreeSpace());

                                    //Create new exam unit
                                    $newExamUnit = new ExamUnit();

                                    $newExamUnit->setVenue(ExamCenters::find($venue->getId()));
                                    $newExamUnit->addCourses($course->getId());

                                    $examUnits[] = $newExamUnit;

                                    $requiredSpace = $requiredSpace - $venue->getFreeSpace();

                                    //Add Students to scheduler
                                    $scheduledStudentAndCourses = $this->addStudentsToScheduler($scheduledStudentAndCourses, $course->getId(), $venue->getId(), $venue->getFreeSpace(), $timeSlot, $students, $examDay->getDate());

                                    $venue->setFilled(true);
                                }

                            }
                            else {

                                $newExamUnit = new ExamUnit();

                                $newExamUnit->setVenue(ExamCenters::find($venue->getId()));
                                $newExamUnit->addCourses($course->getId());

                                $examUnits[] = $newExamUnit;

                                //Add Students to scheduler
                                $scheduledStudentAndCourses = $this->addStudentsToScheduler($scheduledStudentAndCourses, $course->getId(), $venue->getId(), count($course->getStudents()), $timeSlot, $course->getStudents(), $examDay->getDate());

                                $venue->setFilled(true);

                                $checkDailyStudents++;

                                if($checkDailyStudents % 2 == 0) {
                                    $dailyStudents = array_merge($dailyStudents, $course->getStudents());
                                }
                            }

                        } else {
                            $xmUnit->addCourses($course->getId());
                            $scheduledStudentAndCourses = $this->addStudentsToScheduler($scheduledStudentAndCourses, $course->getId(), $venue->getId(), count($course->getStudents()), $timeSlot, $course->getStudents(), $examDay->getDate());
                        }

                        Utility::$currentStudents = array_merge(Utility::$currentStudents, $course->getStudents());

                        if(!$venue) {
                            continue;
                        }
                        $venue->setFreeSpace($venue->getFreeSpace() - count($course->getStudents()));
                        $course->setAssigned(true);

                    }while($venue AND $venue->getFreeSpace() > 0);
                    //End of add courses for a unit

                    $examUnits[] = $xmUnit;
                }

                //Reset all centers at the end of each time slot
                foreach ($allCenters as $cen) {
                    $cen->setFreeSpace($cen->getCapacity());
                    $cen->setFilled(false);
                }

                $exam = new Exam($examUnits);
                $exam->setStudents(Utility::$currentStudents);
                $exam->setTimeSlot($timeSlot);

                $examDay->addExams($exam);
            }

            //Add examDay to allExamDays array
            $allExamDays[] = $examDay;
        }

        $notAssignedCourses = collect($courses)
            ->filter(function ($c) {
                return !$c->isAssigned();
            })->all();
        return
            [
                'examDays' => $allExamDays,
                'scheduledStudentAndCourses' => $scheduledStudentAndCourses,
                'unAssignedCourses' => $notAssignedCourses,
            ];
    }


    private function getCourses(Request $request): array
    {
        $courses = [];
        $courseMode = $request->get('course-mode');

        if($courseMode === 'all') {
            $courses = $this->getAllAvailableCourses();
        }

        elseif ($courseMode === 'faculty') {
            $courses = $this->getFacultyCourses($request->get('faculty-course'));
        }

        elseif ($courseMode === 'department') {
            $courses = $this->getDepartmentCourses($request->get('dept_course'));
        }

        return $courses->shuffle()->all();
    }

    /**
     * @throws Exception
     */
    private function getExamDates(string $startDate, string $stopDate): array
    {
        $start = date('Y-M-d l', strtotime($startDate));
        $stop = date('Y-M-d l', strtotime($stopDate));

        $startDateTime = new DateTime($start);
        $stopDateTime = new DateTime($stop);

        $interval = $startDateTime->diff($stopDateTime)->d;

        $count = 0;

       do {
           $dates[$count] = new ExamDay($this->getDateDay($start)[0], $this->getDateDay($start)[1]);
           $count += 1;

           $start = date('Y-M-d l', strtotime($startDate. ' +' . $count . ' day'));
       } while($count <= $interval);

        return $dates;
    }

    private function getDateDay(string $date): array
    {
        return explode(' ', $date);
    }

    private function filterAllowedDates(array $examDates, array $allowedDays): array
    {
        $newDates = [];
        foreach ($examDates as $key => $date) {

            if(in_array($date->getWeekDay(), $allowedDays)) {
                $newDates[] = $date;
            }
        }
        return $newDates;
    }

    private function getAvailableCenters(array $centers): array
    {
        $availableCenters = [];

        foreach ($centers as $center) {
            $var = ExamCenters::find($center);
            if($var->active) {
                $availableCenters[] = $var;
            }
        }
        return $availableCenters;
    }

    private function getAllAvailableCourses()
    {
        $school = Auth::user()->school;

        $faculties = $school->faculties;
        $depts = Department::whereIn('faculty_id', $faculties->map(function($faculty) {return $faculty->id;}))->get();

        return Course::whereIn('department_id', $depts->map(function ($dep) { return $dep->id;}))
            ->where('active', 1)
            ->get();
    }

    private function getFacultyCourses(int $facultyID)
    {
        $depts = Department::where('faculty_id', $facultyID)->get();

        return Course::whereIn('department_id', $depts->map(function ($dep) { return $dep->id;}))
            ->where('active', 1)
            ->get();
    }

    private function getDepartmentCourses(int $deptId)
    {
        return Course::where('department_id', $deptId)
            ->where('active', 1)
            ->get();
    }

    private function sortCoursesByStudents(array $courses): array
    {
        for($i = 0; $i < count($courses); $i++) {
            for ($j = 0; $j < count($courses) - 1; $j++) {
                if($courses[$j]->students->count() > $courses[$j + 1]->students->count()) {
                    $var = $courses[$j];
                    $courses[$j] = $courses[$j + 1];
                    $courses[$j + 1] = $var;
                }
            }
        }

        return $courses;
    }

    private function sortCentersByCapacity(array $centers): array
    {
        for($i = 0; $i < count($centers); $i++) {
            for ($j = 0; $j < count($centers) - 1; $j++) {
                if ($centers[$j]->capacity > $centers[$j + 1]->capacity) {
                    $var = $centers[$j];
                    $centers[$j] = $centers[$j + 1];
                    $centers[$j + 1] = $var;
                }
            }
        }
        return $centers;
    }

    private function generalCoursesFirst(array $courses): array
    {
        for($i = 0; $i < count($courses); $i++) {
            for ($j = 0; $j < count($courses) - 1; $j++) {
                if ($courses[$j]->general < $courses[$j + 1]->general) {
                    $var = $courses[$j];
                    $courses[$j] = $courses[$j + 1];
                    $courses[$j + 1] = $var;
                }
            }
        }
        return $courses;

    }

    private function nextCourse($courses, array $currentStudents, $dailyStudents, $currentCourseId) {

        foreach ($courses as $cours) {

            if(
                !$cours->isAssigned() AND
                count(array_intersect($cours->getStudents(), $currentStudents)) < 1 AND
                $cours->getId() != $currentCourseId AND
                count(array_intersect($cours->getStudents(), $dailyStudents)) < 1) {
                return $cours;
            }
        }

    }


    /**
     * @param Collections $allCenters
     * @param int $requiredSpace
     * @return false|mixed
     */
    private function getNextAvailableCenter(Collections $allCenters, int $requiredSpace): mixed
    {
        $total = 0;

        $allCenters = $allCenters->filter(function ($v) {return !$v->isFilled();});

        foreach ($allCenters->all() as $center) {
            $total = $total + $center->getFreeSpace();
        }

        if($total < $requiredSpace) {
            return false;
        }

        else {
            return
                $allCenters
                    ->sort(function ($val1, $val2) { return $val1->getFreeSpace() > $val2->getFreeSpace(); })
                    ->filter(function ($va) {return !$va->isFilled();})
                    ->first();
        }

    }

    private function getCenter(Collections $allCenters, int $currentRequiredSpace)
    {
        return $allCenters
            ->map(function ($c) use ($currentRequiredSpace) { return ($c->getFreeSpace() >= $currentRequiredSpace) ? $c : null; })
            ->filter(function ($f) { return $f != null;})
            ->sort(function ($v1, $v2) { return $v1->getFreeSpace() < $v2->getFreeSpace();})
            ->first();
    }

    private function sanitizeExamDays(array $processedExamDays): Collections
    {
        return
            collect($processedExamDays)->filter(function ($day) {
                $available = true;
                foreach ($day->getExams() as $exam) {
                    $available = count($exam->getStudents()) > 0;
                    if($available) break;
                }
                return $available;
            })->map(function ($value) {

                $newExamDay = new ExamDay(
                    $value->getDate(),
                    $value->getWeekDay()
                );

                $exUnits = [];

                foreach ($value->getExams() as $exam) {
                    foreach ($exam->getExamUnits() as $unit) {
                        if(count($unit->getCourses()) > 0) {
                            $exUnits[] = $unit;
                        }
                    }
                    $ex = new Exam($exUnits);

                    $ex->setTimeSlot($exam->getTimeSlot());
                    $ex->addStudents($exam->getStudents());

                    $newExamDay->addExams($ex);

                    $exUnits = [];
                }

                return $newExamDay;
            });

    }

    private function buildScheduler(TImeTable $timeTable): array
    {
        $finalScheduler = [];

        $schedule = $timeTable->getScheduledStudentAndCourses();

        $groupedStudentsByDay = $this->sortStudentsByExamDay($schedule);
        $groupedStudentsByVenue = $this->sortSudentsByVenue($groupedStudentsByDay);


        foreach ($groupedStudentsByVenue as $date => $value) {
            foreach ($value as $venue => $schdedules) {
                foreach ($schdedules as $schdedule) {
                    $finalScheduler[$date][$venue][$schdedule->getTimeSlot()][] = $schdedule->getStudents()->all();
                }
            }
        }

        foreach ($groupedStudentsByVenue as $date => $value) {
            foreach ($value as $venue => $schdedules) {
                foreach ($schdedules as $schdedule) {
                    $finalScheduler[$date][$venue][$schdedule->getTimeSlot()] = $this->array_flatten($finalScheduler[$date][$venue][$schdedule->getTimeSlot()]);
                }
            }
        }

        return $finalScheduler;

    }

    /**
     * @param array $scheduledStudentAndCourses
     * @param int $courseId
     * @param int $venueId
     * @param int $venueFreeSpace
     * @param string $timeSLot
     * @param array $students
     * @param string $examDate
     * @return array
     */

    private function addStudentsToScheduler(array $scheduledStudentAndCourses, int $courseId, int $venueId, int $venueFreeSpace, string $timeSLot, array $students = [], string $examDate): array
    {
        $scheduledStudentAndCourses[] = new Schedule(Course::find($courseId)->code, ExamCenters::find($venueId)->code, $timeSLot, $examDate, $venueFreeSpace, $students);
        return $scheduledStudentAndCourses;
    }

    /**
     * @param Collections $allStudents
     * @param int $freeSpace
     * @return array
     */
    private function getStudentsRequired(Collections $allStudents, int $freeSpace): array
    {
        $students = [];

        for ($i = 0; $i < $freeSpace; $i++) {
            $students[] = $allStudents->pop();
        }

        return $students;
    }

    private function sortSudentsByVenue(array $schedule): array
    {
        $groupedStudentsByVenue = [];

        foreach ($schedule as $key => $value) {

            $groupedStudentsByVenue[$key] = collect($value)
                ->groupBy(function ($item, $ke) use ($value) {
                    return $value[$ke]->getVenue();
                })->all();
        }
        return $groupedStudentsByVenue;
    }

    /**
     * @param array $schedule
     * @return array
     */
    private function sortStudentsByExamDay(array $schedule): array
    {
        return collect($schedule)
            ->groupBy(function ($item, $key) use ($schedule) {
                return $schedule[$key]->getExamDate();
            })->all();
    }

    private function getTimeSchedule(array $getTimeSlots): array
    {
        $times = [];

        foreach ($getTimeSlots as $timeSlot) {
            $times[$timeSlot] = [];
        }

        return $times;
    }



    /**
     * Convert a multi-dimensional array into a single-dimensional array.
     * @author Sean Cannon, LitmusBox.com | seanc@litmusbox.com
     * @param  array $array The multi-dimensional array.
     * @return array
     */
    function array_flatten(array $array) {

        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->array_flatten($value));
            } else {
                $result = array_merge($result, array($key => $value));
            }
        }
        return $result;
    }
}
