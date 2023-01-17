@extends('layouts.backend')

@section('content')

    @component('components.dashboard.nav-bar')
    @endcomponent

    @component('components.dashboard.page-header')
    @endcomponent

    @component('components.examCenters.exam-center-all', ['examCenters' => $examCenters])
    @endcomponent

    @component('components.dashboard.footer')
    @endcomponent

@endsection
