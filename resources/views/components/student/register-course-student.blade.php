<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>OneUI - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="assets/js/plugins/select2/css/select2.min.css">

    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
<!-- Page Container -->

<div id="page-container" class="sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Student Course Registration
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                            Register all your courses for 2019/2020 session.
                        </h2>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="javascript:void(0)">Cancel</a>
                            </li>

                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content py-2">
            <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form
                action=""
                method="POST"
                class="js-validation" >

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">2019/2020</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- Regular -->
                        <h2 class="content-heading border-bottom mb-4 pb-2">Student Information</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Basic information about you, this must be accurate and exact with information provided during course registration. <br><strong>All fields marked with <span class="text-danger">*</span> are compulsory</strong>
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="val-username">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-username" name="student-fullname" placeholder="Enter a your full name..">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-email" name="student-email" placeholder="Your valid email..">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="matric">Matric Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="matric" name="student-matric" placeholder="Your valid email..">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="level">Current Level<span class="text-danger">*</span></label>
                                    <select class="form-select" id="level" name="student-level">
                                        <option selected="">select level..</option>
                                        <option value="100 Level">100 Level</option>
                                        <option value="200 Level">200 Level</option>
                                        <option value="300 Level">300 Level</option>
                                        <option value="400 Level">400 Level</option>
                                        <option value="500 Level">500 Level</option>
                                        <option value="600 Level">600 Level</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="example-select">Faculty<span class="text-danger">*</span></label>
                                    <select class="form-select" id="example-select" name="student-faculty">
                                        <option selected="">select faculty..</option>
                                        <option value="Computing">Computing</option>
                                        <option value="Science">Science</option>

                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="example-select">Department<span class="text-danger">*</span></label>
                                    <select class="form-select" id="example-select" name="student-department">
                                        <option selected="">select department..</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Information System">Information System</option>

                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="fees">School fees receipt Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fees" name="student-fees" placeholder="Enter your school fees receipt no...">
                                </div>


                            </div>
                        </div>
                        <!-- END Regular -->

                        <!-- Advanced -->
                        <h2 class="content-heading border-bottom mb-4 pb-2">SELECT COURSES</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    This must be carefully selected so as to avoid missing a particular exam
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">

                                <div class="mb-4">
                                    <label class="form-label">Available Courses</label>
                                    <div class="space-x-2">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                    </div>

                                    <div class="space-x-2">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="example-checkbox-inline1">
                                            <label class="form-check-label" for="example-checkbox-inline1">Course 1</label>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END Advanced -->

                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Register</button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </div>
        </form>
        </div>
    </main>
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



<!--
    OneUI JS

    Core libraries and functionality
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="assets/js/oneui.app.min.js"></script>

<!-- jQuery (required for Select2 + jQuery Validation plugins) -->
<script src="assets/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/plugins/jquery-validation/additional-methods.js"></script>

<!-- Page JS Helpers (Select2 plugin) -->
<script>One.helpersOnLoad(['jq-select2']);</script>

<!-- Page JS Code -->
<script src="assets/js/pages/be_forms_validation.min.js"></script>
</body>
</html>
