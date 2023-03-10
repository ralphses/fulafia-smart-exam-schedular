@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.school-profile', ['school' => $school, 'courses' => $courses])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
