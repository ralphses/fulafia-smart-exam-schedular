<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Time Slots
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Manage <strong>Time slots</strong> for your school Exams
                    </h2>
                </div>

                @if(session('timeslots'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('timeslots') }} <a class="alert-link" href="{{ route('timeslot.all') }}">OK</a>!
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
        <div class="block block-rounded" style="padding: 1%">

            <div class="col-sm-6 col-xl-4" style="margin-left: 77%">
                <div class="dropdown">
                    <button type="button" class="btn btn-alt-secondary dropdown-toggle" id="dropdown-default-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by...
                    </button>

                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-light" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(0px, -39px, 0px);" data-popper-placement="top-start">
                        <a class="dropdown-item" href="{{ route('timeslot.all', ['sortBy' => 'name', 'orderBy' => 'asc']) }}">Name - asc</a>
                        <a class="dropdown-item" href="{{ route('timeslot.all', ['sortBy' => 'name', 'orderBy' => 'desc']) }}">Name - dsc</a>

                        <a class="dropdown-item" href="{{ route('timeslot.all', ['sortBy' => 'active', 'orderBy' => 'desc']) }}">Status - enabled</a>
                        <a class="dropdown-item" href="{{ route('timeslot.all', ['sortBy' => 'active', 'orderBy' => 'asc']) }}">Status - disabled</a>
                    </div>
                </div>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 15%;">S/N</th>
                            <th style="width: 25%;">Name</th>
                            <th style="width: 20%;">Start</th>
                            <th style="width: 20%;">Stop</th>
                            <th style="width: 20%;">Duration</th>
                            <th style="width: 20%;">Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($timeslots as $timeslot)
                            <tr>
                                <td class="text-center">
                                    {{ ++$loop->index }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $timeslot->name }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timeslot->start_time }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timeslot->stop_time }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $timeslot->duration }}
                                </td>


                                <td class="text-center">
                                    <div class="btn-group">

                                        <form action="{{ route('timeslot.remove', ['id' => $timeslot->id]) }}" method="POST">

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
