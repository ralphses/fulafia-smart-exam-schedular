<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\NewCourseRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $sortBy = $request->get('sortBy') ?? 'title';
        $order = $request->get('orderBy') ?? 'asc';

        $faculties = Faculty::where('school_id', Auth::user()->school->id)->get()->map(function ($value) {return $value->id;});

        $departments = Department::whereIn('faculty_id', $faculties->all())->get()->map(function ($value) {return $value->id;});

        $courses = Course::whereIn('department_id', $departments)
            ->orderBy($sortBy, $order)
            ->get();

        return response()->view('course-all', ['courses' => $courses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $faculties = Auth::user()->school->faculties;

        $departments = Department::whereIn('faculty_id', $faculties->map(function ($value) { return $value->id;})->all())->get();

        return response()->view('new-course', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewCourseRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(NewCourseRequest $request)
    {
        $request->validated();

        Course::create([
            'title' => $request->get('course-title'),
            'department_id' => $request->get('course-department'),
            'code' => $request->get('course-code'),
            'unit' => $request->get('course-unit'),
            'level' => $request->get('course-level'),
            'general' => $request->get('course-general'),
            'semester' => $request->get('course-semester'),
        ]);

        return redirect(route('course.all'))->with('course', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Application|RedirectResponse|Redirector
     */
    public function status(int $id): Redirector|RedirectResponse|Application
    {
        $course = Course::find($id);
        $status = !$course->active;

        $message = $status ? ' enabled' : 'disabled';

        $course->update(['active' => $status]);

        return redirect(route('course.all'))->with('courses', $course->code. $message. ' successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, int $id): Response
    {
        $course = Course::find($id);

        $facultyIds = Auth::user()->school->faculties->map(function ($value) {return $value->id;});


        $request->session()->flash('update', 'true');
        $departments = Department::whereIn('faculty_id', $facultyIds)->get();

        return response()->view('course-update', ['course' => $course, 'departments' => $departments]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseUpdateRequest $request
     * @param int $id
     */
    public function update(Request $request, int $id): Redirector|Application|RedirectResponse
    {
        $course = Course::find($id);

        $request->validate([
            'course-title' => ['required', 'string', Rule::unique('courses', 'title')->ignore($course->id)],
            'course-department'  => ['required', Rule::exists('departments', 'id')],
            'course-code'  => ['required', 'string', Rule::unique('courses', 'code')->ignore($course->id)],
            'course-unit'  => ['required', 'integer'],
            'course-semester'  => ['required', Rule::in(['first', 'second'])],
            'course-level'  => ['required', 'string'],
        ]);

        $course->update([
            'title' => $request->get('course-title'),
            'department_id' => $request->get('course-department'),
            'code' => $request->get('course-code'),
            'unit' => $request->get('course-unit'),
            'level' => $request->get('course-level'),
            'semester' => $request->get('course-semester'),
        ]);

        return redirect(route('course.all'))->with('courses', $course->code. " Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
