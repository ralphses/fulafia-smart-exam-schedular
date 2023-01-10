<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        School Profile
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Manage your school profile
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
        <form class="js-validation" action="be_forms_validation.html" method="POST">
            <div class="block block-rounded">

                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <h2 class="content-heading border-bottom mb-4 pb-2">Regular</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Username, email and password validation made easy for your login/register forms
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="val-username">School name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="val-username" name="school-name">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-email">Official email</label>
                                <input type="email" class="form-control" id="val-email" name="school-email">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="val-website">Website</label>
                                <input type="text" class="form-control" id="val-website" name="school-website" placeholder="http://example.com">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="val-suggestions">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="val-suggestions" name="address-suggestions" rows="5" placeholder="School Address here..."></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Logo</label>
                                <input class="form-control" type="file" id="example-file-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="val-password">Total Registered Students <span class="text-danger">*</span></label>
                                <input type="number" value="0" class="form-control" id="val-password" name="reg-students" disabled>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-password">Total Registered Courses <span class="text-danger">*</span></label>
                                <input type="number" value="0" class="form-control" id="val-password" name="reg-courses" disabled>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-password">Total Exam Centers <span class="text-danger">*</span></label>
                                <input type="number" value="0" class="form-control" id="val-password" name="exam-centers" disabled>
                            </div>

                        </div>
                    </div>
                    <!-- END Regular -->

                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </div>
            </div>
        </form>
        <!-- jQuery Validation -->

        <!-- Terms Modal -->
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
