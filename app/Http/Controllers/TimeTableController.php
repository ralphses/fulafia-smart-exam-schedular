<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\TImeTable;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
}
