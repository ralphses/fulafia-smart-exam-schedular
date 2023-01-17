<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\ExamCenters;
use App\Models\Models\ExamDay;
use App\Models\TImeTable;
use App\Utilities\Utility;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
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

        //Sort courses by number of students
        $courses = $this->sortCoursesByStudents($courses);

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
        $session = $request->get('session') . ' SESSION';

        //Get exam start and stop date
        $start = date('l, Y-M-d', strtotime($request->get('date_start')));
        $stop = date('l, Y-M-d', strtotime($request->get('date_stop')));

        //Set planner name
        $planner = $request->get('planning-officer');

        //Get Instructions
        $instructions = preg_split('/\r\n/', $request->get('instructions'));

        dd($instructions);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TImeTable  $tImeTable
     * @return \Illuminate\Http\Response
     */
    public function show(TImeTable $tImeTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TImeTable  $tImeTable
     * @return \Illuminate\Http\Response
     */
    public function edit(TImeTable $tImeTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TImeTable  $tImeTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TImeTable $tImeTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TImeTable  $tImeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TImeTable $tImeTable)
    {
        //
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

        return $courses->all();
    }


    /**
     * @throws \Exception
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

    private function sortCentersByCapacity(array $centers)
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
}
