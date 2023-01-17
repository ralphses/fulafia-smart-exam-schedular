@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.examCenters.exam-center-new')
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
