<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Courses
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Manage your school Courses
                    </h2>
                </div>

                @if(session('courses'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('courses') }} <a class="alert-link" href="{{ route('dashboard') }}">OK</a>!
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
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'title', 'orderBy' => 'asc']) }}">Title - asc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'title', 'orderBy' => 'desc']) }}">Title - dsc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'department_id', 'orderBy' => 'asc']) }}">Department</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'unit', 'orderBy' => 'asc']) }}">Credit unit - asc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'unit', 'orderBy' => 'desc']) }}">Credit unit - dsc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'semester', 'orderBy' => 'asc']) }}">Semester - asc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'semester', 'orderBy' => 'desc']) }}">Semester - dsc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'level', 'orderBy' => 'asc']) }}">Level  - asc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'level', 'orderBy' => 'desc']) }}">Level  - dsc</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'active', 'orderBy' => 'desc']) }}">Status - enabled</a>
                        <a class="dropdown-item" href="{{ route('course.all', ['sortBy' => 'active', 'orderBy' => 'asc']) }}">Status - disabled</a>
                    </div>
                </div>
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">S/N</th>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 10%;">Code</th>
                            <th style="width: 10%;">Unit</th>
                            <th style="width: 10%;">Department</th>
                            <th style="width: 5%;">Semester</th>
                            <th style="width: 10%;">Level</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 20%;">Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($courses as $course)
                            <tr>
                                <td class="text-center">
                                    {{ ++$loop->index }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $course->title }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $course->code }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $course->unit }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $course->department->name }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $course->semester }}
                                </td>

                                <td class="fw-semibold fs-sm">
                                    {{ $course->level }}
                                </td>
                                <td class="fs-sm">
                                    @if($course->active)
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-black">Enabled</span>
                                    @else
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                                    @endif
                                </td>


                                <td class="text-center">
                                    <div class="btn-group">

                                        <a href="{{ route('course.edit', ['id' => $course->id]) }}">
                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('course.status', ['id'=>$course->id]) }}" method="POST">

                                            @method('PATCH')
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
