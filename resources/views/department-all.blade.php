@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.dashboard.department-all', ['departments' => $departments])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
