@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.department.department-new', ['faculties' => $faculties])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
