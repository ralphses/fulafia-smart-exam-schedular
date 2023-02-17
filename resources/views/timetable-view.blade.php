@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.timetable.timetable-view', ['timetable' => $timetable])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
