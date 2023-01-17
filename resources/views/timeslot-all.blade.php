@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.timeslots.timeslot-all', ['timeslots' => $timeslots])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
