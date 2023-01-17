<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Exam Centers
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Manage <strong>Exam Centers</strong> in your school
                    </h2>
                </div>

                @if(session('exam-center'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('exam-center') }} <a class="alert-link" href="{{ route('dashboard') }}">OK</a>!
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
                        <a class="dropdown-item" href="{{ route('exam_center.all', ['sortBy' => 'name', 'orderBy' => 'asc']) }}">Name - asc</a>
                        <a class="dropdown-item" href="{{ route('exam_center.all', ['sortBy' => 'name', 'orderBy' => 'desc']) }}">Name - dsc</a>

                        <a class="dropdown-item" href="{{ route('exam_center.all', ['sortBy' => 'active', 'orderBy' => 'desc']) }}">Status - enabled</a>
                        <a class="dropdown-item" href="{{ route('exam_center.all', ['sortBy' => 'active', 'orderBy' => 'asc']) }}">Status - disabled</a>
                    </div>
                </div>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">S/N</th>
                            <th style="width: 10%;">Code</th>
                            <th style="width: 25%;">Name</th>
                            <th style="width: 15%;">Capacity</th>
                            <th style="width: 20%;">Status</th>
                            <th style="width: 20%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($examCenters as $examCenter)
                            <tr>
                                <td class="text-center">
                                    {{ ++$loop->index }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $examCenter->code }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $examCenter->name }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $examCenter->capacity }}
                                </td>

                                <td class="fs-sm">
                                    @if($examCenter->active)
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-black">Enabled</span>
                                    @else
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="btn-group">

                                        <a href="{{ route('exam_center.show', ['id' => $examCenter->id]) }}">
                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('exam_center.status', ['id' => $examCenter->id]) }}" method="POST">

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
