<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewExamCenterRequest;
use App\Models\ExamCenters;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExamCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('exam-center-all', ['examCenters' => Auth::user()->school->examCenters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('exam-center-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewExamCenterRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(NewExamCenterRequest $request): Redirector|RedirectResponse|Application
    {
        $request->validated();

        ExamCenters::create([
            'code' => $request->get('center-code'),
            'name' => $request->get('center-name'),
            'capacity' => $request->get('center-capacity'),
            'school_id' => Auth::user()->school->id,
            'free_space' => 0,
        ]);

        session()->flash('exam-center', 'New center added successfully!');

        return redirect(route('exam_center.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamCenters  $examCenters
     * @return Response
     */
    public function show(int $id): Response
    {
        return response()->view('exam-center-update', ['center' => ExamCenters::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewExamCenterRequest $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id): Redirector|RedirectResponse|Application
    {

        $request->validate([
            'center-code' => ['required', Rule::unique('exam_centers', 'code')->ignore($id)],
            'center-name' => ['required', Rule::unique('exam_centers', 'name')->ignore($id)],
            'center-capacity' => ['required', 'regex:(\\d)']
        ]);

        $examCenter = ExamCenters::find($id);

        $examCenter->update([
            'code' => $request->get('center-code'),
            'name' => $request->get('center-name'),
            'capacity' => $request->get('center-capacity'),
            'active' => $request->get('center-status') == 1
        ]);

        session()->flash('exam-center', 'Exam center updated successfully!');

        return redirect(route('exam_center.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        ExamCenters::destroy($id);

        session()->flash('exam-center', 'Exam center deleted successfully!');

        return redirect(route('exam_center.all'));
    }
}
