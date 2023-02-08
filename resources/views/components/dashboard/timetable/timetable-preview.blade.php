<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1 text-center">
                    <h1 class="h3 fw-bolder mb-2">
{{--                        {{strtoupper($timetable->school_name)}}--}}
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        {{ 'SESSION: ' . $timetable->session . ' '.  $timetable->semester . ' EXAMINATION TIMETABLE' }}
                    </h2>
                </div>

                @if(session('timetable'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('timetable') }} <a class="alert-link" href="{{ route('dashboard') }}">OK</a>!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <div class="content">

        <!-- Full Table -->
        <div class="block block-rounded">

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th style="width: 15%;">Date/Days</th>
                            @foreach($timetable->getTimeSlots() as $timeSlot)
                                <th style="width: 27%;">{{ $timeSlot }}</th>
                            @endforeach
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($timetable->getExamDays() as $examDay)
                            <tr>
                                <td class="fw-semibold fs-sm">
                                    {{ $examDay->getDate() }}
                                    {{  "(".$examDay->getWeekDay().")" }}
                                </td>

                                @foreach($examDay->getExams() as $examD)
                                    <td class="fs-sm">
                                        @foreach($examD->getExamUnits() as $unit)

                                            {{$unit->getVenue()->code}}
                                        [
                                            @foreach($unit->getCourses() as $course)
                                                <p class="fw-semibold d-flex d-inline-flex m-0">
                                                    {{ $course->code }}

                                                    @foreach($timetable->getScheduledStudentAndCourses() as $schedule)
                                                        @if($schedule->getCourseCode() == $course->code AND $schedule->getVenue() == $unit->getVenue()->code)
                                                            {{'(' .$schedule->getNoOfStudents(). 'stds)' }}
                                                        @endif
                                                    @endforeach

                                                </p>
                                            @endforeach
                                        ]
                                            <br>
                                            @if(count($unit->getCourses()) > 2)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h6 class="text-black" style="margin: 0">INSTRUCTIONS</h6>
        @foreach($timetable->instructions as $instruction)
            <p class="text-sm-start" style="margin: auto; font-size: smaller">{{++$loop->index. '. '. $instruction}}</p>
            <!-- END Full Table -->
        @endforeach

        <br>

        <strong><h6 class="text-sm-end" style="margin: auto;">{{ $timetable->planner }}</h6></strong>
        <i><h6 class="text-sm-end" style="margin: auto;">Timetable Officer</h6></i>

        <div class="row items-push">
            <div class="col-lg-8 offset-lg-2 d-flex d-md-flex">
                <button type="submit" class="btn btn-alt-primary btn-group-lg" style="width: 80%">Finish</button>
            </div>
        </div>

    </div>
</main>
