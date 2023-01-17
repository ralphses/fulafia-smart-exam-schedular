<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewStudentRegistrationRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $faculties = Auth::user()->school->faculties->map(function ($values) {return $values->id;});
        $students = Student::whereIn('faculty_id', $faculties)->get();

        return response()->view('student-all', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        session()->put('new-student-reg', 'd');

        return response()->view('student-register', [
            'schools' => School::all(['id','name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewStudentRegistrationRequest $request
     * @return RedirectResponse
     */
    public function store(NewStudentRegistrationRequest $request): RedirectResponse
    {
        $request->validated();

        session()->forget('new-student-reg');
        session()->put('new_std1', $request->all());

        return redirect('/students/register/faculty/'. School::findOrFail($request->get('student-school'))->id);

    }


   public function registerCourses(Request $request, int $departmentId = 0) {


        if($request->method() === 'GET') {

            if($departmentId == 0) {
                redirect('/');
            }

            $courses = Course::where('department_id', $departmentId);

            session()->forget('elect-courses');
            return view('student-register', ['courses' => $courses]);
        }

        else {

            $request->validate(['student-courses' => ['required', Rule::exists('courses', 'id')]]);

            $courses = Course::whereIn('id', $request->get('student-courses'))->get();

            $student = Student::create([
                'name' => session('new_std1')['student-name'],
                'matric' => session('new_std1')['student-matric'],
                'level' => session('new_std1')['student-level'],
                'fees' => session('new_std1')['student-fees'],
                'email' => session('new_std1')['student-email'],
                'school_id' => session('new_std1')['student-school'],
                'department_id' => Department::where('name', session('new_std2')['student-department'])->first()->id,
                'faculty_id' => session('new_std2')['student-faculty'],
            ]);

            $student->courses()->attach($courses);

            session()->forget(['new_std1', 'new_std2', 'select-courses']);

            dd(Course::find(2)->students);
        }
   }

   public function registerFaculty(Request $request) {

       $request->validate([
           'student-department' => ['required', Rule::exists('departments', 'name')],
           'student-faculty' => ['required', Rule::exists('faculties', 'id')],
       ]);

       session()->forget('new-student');

       session()->put('new_std2', $request->all());
       session()->put('select-courses', 'true');

       return redirect('/students/register/courses/'. Department::where('name', $request->get('student-department'))->first()->id);


   }

   public function registerFacultyStart(int $schoolId) : Response {

        $school = School::findOrFail($schoolId);
        $faculties = $school->faculties;
        $departments = Department::whereIn('faculty_id', $faculties->map(function ($value) { return $value->id; }) )->get();

        session()->put('new-student', 'true');

       return response()->view('student-register', ['faculties' => $faculties, 'departments' => $departments]);
   }

   public function destroy (Request $request, int $id) {
        Student::destroy($id);

        session()->flash('student', 'Student Deleted Successfully');

        return $this->index();
   }
}
