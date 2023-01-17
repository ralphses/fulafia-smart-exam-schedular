@extends('layouts.landing')

@section('content')

    @component('components.student.student-register-faculty', ['departments' => $departments, 'faculties' => $faculties])
    @endcomponent

@endsection

