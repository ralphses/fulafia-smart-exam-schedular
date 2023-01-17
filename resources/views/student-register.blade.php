@extends('layouts.landing')

@section('content')

    @if(session('new-student-reg'))
        @component('components.student.student-register', ['schools' => $schools])
        @endcomponent

    @elseif(session('new-student'))
        @component('components.student.student-register', ['departments' => $departments, 'faculties' => $faculties])
        @endcomponent

    @elseif(session('select-courses'))
        @component('components.student.student-register', ['courses' => $courses])
        @endcomponent
    @endif


@endsection

