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
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="" method="POST">

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
                                <label class="form-label" for="val-username">Course Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="course-title">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Course Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="course-code">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-password">Credit Unit <span class="text-danger">*</span></label>
                                <input type="number" value="0" class="form-control" id="val-password" name="credit-unit">
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
