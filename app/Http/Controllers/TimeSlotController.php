<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Time\Time;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('timeslot-all', ['timeslots' => Auth::user()->school->timeslots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('timeslot-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            'timeslot-start' => ['required'],
            'timeslot-stop' => ['required']
        ]);

        $start = $request->get('timeslot-start');
        $stop = $request->get('timeslot-stop');

        $startTime = new DateTime($start);
        $stopTime = new DateTime($stop);

        if($startTime > $stopTime OR $start == $stop) {
            return redirect()->back()->withInput()->with('time', 'Start time must be less than Stop time');
        }

        if (TimeSlot::where('school_id', Auth::user()->school->id)->where('start_time', $start)->get()->count() > 0) {
            return redirect()->back()->withInput()->with('time', 'Start time already taken');
        }

        if (TimeSlot::where('school_id', Auth::user()->school->id)->where('stop_time', $stop)->get()->count() > 0) {
            return redirect()->back()->withInput()->with('time', 'Stop time already taken');
        }

        $startingTime = $this->convertTime($start);
        $stoppingTime = $this->convertTime($stop);
        $timeSlotName = $startingTime . ' - ' . $stoppingTime;
        $duration = $this->findDuration($startTime, $stopTime);

        TimeSlot::create([
            'name' => $timeSlotName,
            'start_time' => $startingTime,
            'stop_time' => $stoppingTime,
            'duration' => $duration,
            'school_id' => Auth::user()->school->id
        ]);

        return view('timeslot-all', ['timeslots' => Auth::user()->school->timeslots])->with('timeslot', 'New timeslot added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return Response
     */
    public function show(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return Response
     */
    public function edit(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return Response
     */
    public function update(Request $request, TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return Response
     */
    public function destroy(int $id)
    {
        TimeSlot::destroy($id);

        return $this->index();
    }

    private function convertTime(string $time): string
    {

        $thisTime = explode(':', $time);
        $first = $thisTime[0];

        return ($first > 12) ? $first - 12 . ':' .$thisTime[1] . 'PM' : $first . ':' .$thisTime[1] . 'AM';
    }

    private function findDuration(DateTime $startTime, DateTime $stopTime)
    {
        $dateInterval = $startTime->diff($stopTime);

        $mins = $dateInterval->i;
        $hrs = $dateInterval->h;

        $ho = ($hrs > 1) ? 'hours ' : 'hour ';

        return $hrs . $ho . $mins . 'mins';
    }
}
