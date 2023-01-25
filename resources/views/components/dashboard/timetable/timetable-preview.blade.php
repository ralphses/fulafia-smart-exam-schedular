<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Preview Timetable
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Inspect Generated Timetable
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
                            <th style="width: 19%;">Date<br>(Days)</th>
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
                                <td class="fw-semibold fs-sm">

                                    @foreach($examDay->getExams() as $exam)
                                        @if($exam->getTimeSlot())

                                        @endif
                                    @endforeach

                                </td>

                                <td class="fw-semibold fs-sm">

                                </td>

                                <td class="fw-semibold fs-sm">

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
</main>
