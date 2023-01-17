<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        New Time Slot
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Add a new time slot for your school exam timetables
                    </h2>
                </div>
                @if(session('timeslot'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('timeslot') }} <a class="alert-link"
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
        <form class="js-validation" action="{{ route('timeslot.store') }}" method="POST">

            {{ session('time')}}
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
                                <label class="form-label" for="timeslot-start">Start time<span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="timeslot-start"
                                       value="{{ old('timeslot-start') }}" name="timeslot-start">

                                @if($errors->any('timeslot-start'))
                                    <p style="color: red; font-size: small">{{$errors->first('timeslot-start')}}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="timeslot-stop">Stop time<span
                                        class="text-danger">*</span></label>
                                <input type="time"  class="form-control" id="timeslot-stop"
                                       value="{{ old('timeslot-stop') }}" name="timeslot-stop">

                                @if($errors->any('timeslot-stop'))
                                    <p style="color: red; font-size: small">{{$errors->first('timeslot-stop')}}</p>
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
