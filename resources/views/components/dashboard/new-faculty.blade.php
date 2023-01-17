<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        New Faculty
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Register a new faculty for your school
                    </h2>
                </div>
                @if(session('faculty'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('faculty') }} <a class="alert-link" href="{{ route('dashboard') }}">OK</a>!
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
        <form class="js-validation"
              @if(session('update'))
                  action="{{ route('faculty.update', $faculty->id) }}"
              @else
                  action="{{ route('faculty.store') }}"
              @endif

              method="POST">

            <div class="block block-rounded">

                @csrf

                @if(session('update'))
                    @method('PATCH')
                @endif

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
                                <label class="form-label" for="val-username">Faculty Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="faculty-name" value="{{ $faculty->name ?? old('faculty-name') }}">

                                @if($errors->any('faculty-name'))
                                    <p style="color: red; font-size: small">{{$errors->first('faculty-name')}}</p>
                                @endif
                            </div>

                            @if(session('update'))
                                <div class="form-floating mb-4">
                                    <select class="form-select" id="example-select-floating" name="faculty-status" aria-label="Floating label select example">
                                        <option selected value="1">Active</option>
                                        <option value="0">Disable</option>
                                    </select>
                                    <label for="example-select-floating">Category</label>
                                </div>

                            @endif

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
