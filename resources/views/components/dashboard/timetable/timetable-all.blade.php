<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Timetables
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Manage your school Timetables
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
                            <th class="text-center" style="width: 10%;">S/N</th>
                            <th style="width: 30%;">Session</th>
                            <th style="width: 15%;">Semester</th>
                            <th style="width: 15%;">Start date</th>
                            <th style="width: 15%;">Stop date</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($timetables as $timetable)
                            <tr>
                                <td class="text-center">
                                    {{ ++$loop->index }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $timetable->session }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timetable->semester }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timetable->start_date }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timetable->stop_date }}
                                </td>

                                <td class="text-center">
                                    <div class="btn-group">

                                        <a href="{{ route('timetable.view', $timetable->id) }}">
                                            <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('timetable.delete', $timetable->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>

                                        </form>

                                    </div>
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
