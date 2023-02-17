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
{{--    <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png')}}">--}}
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('css/oneui.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body class="p-4">

<div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">


    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-dual" href="{{ "/" }}">
            <span class="smini-visible">
              <i class="fa fa-circle-notch text-primary"></i>
            </span>
                <span class="smini-hide fs-5 tracking-wider">
              One<span class="fw-normal">UI</span>
            </span>
            </a>
            <!-- END Logo -->

        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="/">
                            <i class="nav-main-link-icon si si-home"></i>
                            <span class="nav-main-link-name">Home</span>
                        </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon si si-envelope"></i>
                            <span class="nav-main-link-name">Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="/">
                    FULAFIA<span class="fw-normal"></span>
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="d-flex align-items-center">
                <!-- Menu -->
                <div class="d-none d-lg-block">
                    <ul class="nav-main nav-main-horizontal nav-main-hover">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/">
                                <i class="nav-main-link-icon si si-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Menu -->

                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none ms-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <form class="w-100" method="POST">
                    <div class="input-group input-group-sm">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-lighter">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1 text-center">
                        <h1 class="h3 fw-bolder mb-2">
                        </h1>
                        <h1 class="mb-0">
                            FEDERAL UNIVERSITY OF LAFIA
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                            {{  $timetable->session . ' SESSION '.  $timetable->semester . ' EXAMINATION TIMETABLE' }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <div class="content">

            <!-- Full Table -->
            <div class="block block-rounded p-5">

                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th style="width: 15%;">Date/Days</th>
                                @foreach(\App\Models\TimeSlot::all('name') as $timeSlot)
                                    <th style="width: 27%;">{{ $timeSlot->name }}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($timetable->examDay as $examDay)
                                <tr>
                                    <td class="fw-semibold fs-sm">
                                        {{ $examDay->date }}
                                        {{ "(" . $examDay->week_day . ")" }}
                                    </td>

                                    @foreach($examDay->exams as $examD)

                                        <td class="fs-sm">
                                            @foreach($examD->examUnits as $unit)

                                                {{ \App\Models\ExamCenters::find($unit->exam_center_id)->code }}
                                                [
                                                @foreach($unit->examUnitSchedule as $examUnit)

                                                    <p class="fw-semibold d-flex d-inline-flex m-0">

                                                        {{ \App\Models\Course::find($examUnit->course_id)->code }}
                                                    </p>
                                                @endforeach
                                                ]
                                                <br>
                                                @if($unit->examUnitSchedule->count() > 2)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h6 class="text-black" style="margin: 0">INSTRUCTIONS</h6>
            @foreach(explode('|', $timetable->instructions) as $instruction)
                <p class="text-sm-start" style="margin: auto; font-size: smaller">{{++$loop->index. '. '. $instruction}}</p>
                <!-- END Full Table -->
            @endforeach

            <br>
            <br>


            <strong><h6 class="text-sm-end" style="margin: auto;">{{ $timetable->planner }}</h6></strong>
            <i><h6 class="text-sm-end" style="margin: auto;">Timetable Officer</h6></i>

        </div>


    </main>
    <!-- END Main Container -->

<!-- END Page Container -->

<!--
    OneUI JS

    Core libraries and functionality
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('js/oneui.app.min.js') }}"></script>
</body>
</html>
