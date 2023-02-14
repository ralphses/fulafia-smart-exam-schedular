<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>SmartExams - Dashboard</title>

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

    <!-- Modules -->
    @yield('css')
    @vite(['resources/sass/main.scss'])

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">


    @yield('js')

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" href={{ asset("js/plugins/select2/css/select2.min.css") }}>
    <link rel="stylesheet" id="css-main" href={{ asset("css/oneui.min.css") }}>

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>

<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->

    @yield('content')

</div>
<script src="{{ asset("js/oneui.app.min.js") }}"></script>
<script src="{{ asset("js/lib/jquery.min.js") }}"></script>
<script src="{{ asset("js/plugins/select2/js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/plugins/jquery-validation/jquery.validate.min.js") }}"></script>
<script src="{{ asset("js/plugins/jquery-validation/additional-methods.js") }}"></script>
<script src="{{ asset("js/plugins/chart.js/chart.min.js") }}"></script>
<script src="{{ asset("js/pages/be_pages_dashboard.min.js") }}"></script>
<script>One.helpersOnLoad(['jq-select2']);</script>

<script src="{{ asset("js/pages/be_forms_validation.min.js") }}"></script>


</body>
</html>
