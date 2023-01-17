<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return view('faculty-all', ['faculties' => Auth::user()->school->faculties]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate(['faculty-name' => ['required', 'string', Rule::unique('faculties', 'name')]]);

        Faculty::create([

            'name' => $request->get('faculty-name'),
            'school_id' => Auth::user()->school->id
        ]);

        return redirect()->back()->with('faculty', 'Faculty added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(int $id): Factory|View|Application
    {
        session()->put('update', 'true');
        return view('new-faculty', ['faculty' => Faculty::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     */
    public function update(Request $request, int $id): Redirector|Application|RedirectResponse
    {
        $faculty = Faculty::find($id);

        $request->validate(['faculty-name' => ['required', 'string', Rule::unique('faculties', 'name')->ignore($faculty->id)]]);

        $faculty->update([
            'name' => $request->get('faculty-name'),
            'active' => $request->get('faculty-status') == 1
        ]);

        session()->forget('update');

        return redirect(route('faculty.all'));
    }

    public function status(int $id) {

        Faculty::destroy($id);

        return redirect()->back()->with('faculty', 'Faculty deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
