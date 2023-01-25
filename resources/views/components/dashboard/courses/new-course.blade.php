<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        New Course
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Register a new course for your school
                    </h2>
                </div>
                @if(session('course'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('course') }} <a class="alert-link"
                                                                  href="{{ route('dashboard') }}">OK</a>!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('course.new') }}" method="POST">

            @csrf

            <div class="block block-rounded">

                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <h2 class="content-heading border-bottom mb-4 pb-2"></h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                A course represents a real course as being offered in your school
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="val-username">Course Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username"
                                       value="{{ old('course-title') }}" name="course-title">

                                @if($errors->any('course-title'))
                                    <p style="color: red; font-size: small">{{$errors->first('course-title')}}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Course Code<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="course-code"
                                       value="{{ old('course-code') }}">

                                @if($errors->any('course-code'))
                                    <p style="color: red; font-size: small">{{$errors->first('course-code')}}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-password">Credit Unit <span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ old('course-unit') ?? "0" }}" class="form-control"
                                       id="val-password" name="course-unit">

                                @if($errors->any('course-unit'))
                                    <p style="color: red; font-size: small">{{ $errors->first('course-unit') }}</p>
                                @endif

                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="course-level"
                                        aria-label="Select Course Level">
                                    <option selected="">Select an option</option>
                                    <option value="100">100 level</option>
                                    <option value="200">200 level</option>
                                    <option value="300">300 level</option>
                                    <option value="400">400 level</option>
                                    <option value="500">500 level</option>
                                    <option value="600">600 level</option>
                                    <option value="700">700 level</option>
                                </select>
                                <label for="example-select-floating">Level</label>

                                @if($errors->any('course-level'))
                                    <p style="color: red; font-size: small">{{ $errors->first('course-level') }}</p>
                                @endif
                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="course-semester"
                                        aria-label="Select Course Semester">
                                    <option selected="">Select an option</option>
                                    <option value="first">First Semester</option>
                                    <option value="second">Second Semester</option>
                                </select>
                                <label for="example-select-floating">Semester</label>

                                @if($errors->any('course-semester'))
                                    <p style="color: red; font-size: small">{{ $errors->first('course-semester') }}</p>
                                @endif
                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="course-department"
                                        aria-label="Select Department">
                                    <option selected="">Select an option</option>

                                    @foreach($departments as $department)
                                        <option value={{ $department->id }}>{{ $department->name }}</option>
                                    @endforeach

                                </select>
                                <label for="example-select-floating">Department</label>

                                @if($errors->any('course-department'))
                                    <p style="color: red; font-size: small">{{ $errors->first('course-department') }}</p>
                                @endif
                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="course-general"
                                        aria-label="Select Course Semester">
                                    <option selected value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <label for="example-select-floating">General Course?</label>

                                @if($errors->any('course-general'))
                                    <p style="color: red; font-size: small">{{ $errors->first('course-general') }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <!-- END Regular -->

                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Save</button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </div>
            </div>
        </form>
        <!-- jQuery Validation -->

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
