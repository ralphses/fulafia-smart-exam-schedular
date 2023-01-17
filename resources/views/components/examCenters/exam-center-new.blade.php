<!-- Main Container -->
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
                        Add a new Exam Center for your school examinations
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

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('exam_center.store') }}" method="POST">

            <div class="block block-rounded">

                @csrf

                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <h2 class="content-heading border-bottom mb-4 pb-2"></h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                A faculty represents a real faculty in your school
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="val-username">Center Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="center-name" value="{{ old('center-name') }}">

                                @if($errors->any('center-name'))
                                    <p style="color: red; font-size: small">{{$errors->first('center-name')}}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Center Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="center-code" value="{{ old('center-code') }}">

                                @if($errors->any('center-code'))
                                    <p style="color: red; font-size: small">{{$errors->first('center-code')}}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Center Capacity<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="center-capacity" value="{{ old('center-capacity') }}">

                                @if($errors->any('center-capacity'))
                                    <p style="color: red; font-size: small">{{$errors->first('center-capacity')}}</p>
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
