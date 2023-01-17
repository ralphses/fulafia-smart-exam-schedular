<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolUpdateRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\School;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $faculties = Faculty::where('school_id', Auth::user()->school->id)->get()->map(function ($value) {return $value->id;});
        $departments = Department::whereIn('faculty_id', $faculties->all())->get()->map(function ($value) {return $value->id;});

        $courses = Course::whereIn('department_id', $departments);
        return view('school-profile', ['school' => Auth::user()->school, 'courses' => $courses->count()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolUpdateRequest $request
     */
    public function update(SchoolUpdateRequest $request)
    {

        $request->validated();

        $school = School::where('name', $request->get('school-name'));

        $logoPath = $school->first()->logo;

        if($request->hasFile('school-logo')) {
            $request->validate(['school-logo' => ['required', Rule::imageFile()],]);
            $logoPath = $this->storeImage($request, $school->first());
        }

        $school->update([
            'name' => $request->get('school-name'),
            'email' => $request->get('school-email'),
            'website' => $request->get('school-website'),
            'address' => $request->get('school-address'),
            'logo' => $logoPath,
        ]);

        return redirect()->back()->with('school', 'School profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard(): \Illuminate\Contracts\View\View|Factory|Application
    {
        $faculties = Auth::user()->school->faculties->map(function ($faculty) {return $faculty->id;});
        $depts = Department::whereIn('faculty_id', $faculties)->get()->map(function ($dept) {return $dept->id;});

        $totalFaculties = $faculties->count();
        $totalCenters = Auth::user()->school->examCenters->count();

        $totalStudents = Student::whereIn('department_id', $depts)->get()->count();

        $totalCourses = Course::whereIn('department_id', $depts)->get()->count();

        return view('dashboard',
            [
                'info' => [
                    'faculty' => $totalFaculties,
                    'center' => $totalCenters,
                    'course' => $totalCourses,
                    'student' => $totalStudents
                ]
            ]);


    }

    private function storeImage(Request $request, School $school) {

        if(file_exists($school->logo)) {
            unlink($school->logo);
        }

        $name = str_replace(' ', '', $request->get('school-name'));
        $newImage = uniqid() . '-' . $name . '.' . $request->file('school-logo')->extension();

        $newImagePath = $request->file('school-logo')->move(public_path('landing-assets/img/schools/logos'), $newImage, true);


        return str_replace('C:/Users/Ralph/Desktop/workspace/fulafia-smart-exam-schedular/public', "", str_replace('\\', '/', $newImagePath->getRealPath()));

    }


}
