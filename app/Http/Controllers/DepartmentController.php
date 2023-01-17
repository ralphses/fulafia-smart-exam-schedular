<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $sortBy = $request->get('sortBy') ?? 'name';
        $orderBy = $request->get('orderBy') ?? 'asc';

        $faculties = Faculty::where('school_id', Auth::user()->school->id)
            ->get()
            ->map(function ($value) {return $value->id;});

        $departments = Department::whereIn('faculty_id', $faculties->all())
            ->orderBy($sortBy, $orderBy)
            ->get();

        return response()->view('department-all', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('department-new', ['faculties' => Faculty::where('school_id', Auth::user()->school->id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'department-name' => ['required', 'string', Rule::unique('departments', 'name')],
            'department-faculty' => ['required', 'integer', Rule::exists('faculties', 'id')],
        ]);

        Department::create([
            'name' => $request->get('department-name'),
            'faculty_id' => $request->get('department-faculty')
        ]);

        return redirect(route('department.all'))->with('departments', 'New department added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function status(int $id): Redirector|RedirectResponse|Application
    {
        $department = Department::find($id);

        $department->update([
            'active' => !$department->active
        ]);

        return redirect(route('department.all'))->with('departments', $department->name . ' department updated!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function edit(int $id): Response
    {
        $faculties = Faculty::where('school_id', Auth::user()->school->id)
            ->get();
        return response()->view('department-update', ['department' => Department::find($id), 'faculties' => $faculties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id): Redirector|RedirectResponse|Application
    {
        $request->validate([
            'department-name' => ['required', 'string', Rule::unique('departments', 'name')->ignore($id)],
            'department-faculty' => ['required', 'integer', Rule::exists('faculties', 'id')],
        ]);

        $department = Department::find($id);

        $department->update([
            'name' => $request->get('department-name'),
            'faculty_id' => $request->get('department-faculty'),
            'active' => $request->get('department-status') == 1
        ]);

        return redirect(route('department.all'))->with('departments', $department->name . ' department updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
