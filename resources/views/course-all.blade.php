@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.course-all', ['courses' => $courses])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
