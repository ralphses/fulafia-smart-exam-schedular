<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        New Timetable
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Generate a new timetable for your school
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('timetable.generate') }}" method="POST">
            @csrf

            <div class="block block-rounded">

                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <h2 class="content-heading border-bottom mb-4 pb-2">Heading</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                A course represents a real course as being offered in your school
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label" for="date_start">Start Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_start" name="date_start" value="{{ old('date_start') }}">

                                @if($errors->any('date_start'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('date_start') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="date_stop">Stop Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_stop" name="date_stop" value="{{ old('date_stop') }}">

                                @if($errors->any('date_stop'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('date_stop') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Sort by level ?</label>
                                <div class="space-y-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="example-radios-default1" name="level-sort" value="Yes" checked="">
                                        <label class="form-check-label" for="example-radios-default1">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="example-radios-default2" name="level-sort" value="No">
                                        <label class="form-check-label" for="example-radios-default2">No</label>
                                    </div>
                                </div>

                                @if($errors->any('level-sort'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('level-sort') }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <!-- END date -->

                    <!-- Exam venues -->
                    <h2 class="content-heading border-bottom mb-4 pb-2">EXAM VENUES</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Select all venues to be used for this exam from the list below
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-8">

                            <div class="mb-4">
                                <label class="form-label">Select Exam Venues</label>
                                <div class="space-x-0">
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="all-venues" name="center" >
                                        <label class="form-check-label" for="all-venues">Available Venues</label>
                                    </div>

                                    @foreach($info['center'] as $center)
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input venue" type="checkbox" value=" {{ $center->id }}" id="example-switch-inline2" name="center[]">
                                            <label class="form-check-label" for="example-switch-inline2">{{ $center->name }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="content-heading border-bottom mb-4 pb-2">COURSES</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Select all courses to be included in this timetable. <br><br><strong>NOTE: </strong> <br>Select All courses for all active registered courses. You can also select courses for some faculties
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-8">

                            <div class="mb-4">
                                <label class="form-label" for="faculty">Mode of course selection</label>
                                <select class="form-select" id="faculty" name="course-mode">
                                    <option selected value="all">All Available Courses</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="department">Department</option>
                                    <option value="custom">Custom Selection</option>
                                </select>
                            </div>

                            <div class="mb-4" id="courses" style="display: none">
                                <label class="form-label">Select Courses</label>
                                <div class="space-x-0">

                                    @foreach($info['course'] as $course)
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input venue" type="checkbox" value="{{ $course->id }}" id="example-switch-inline2" name="courses[]">
                                            <label class="form-check-label" for="example-switch-inline2">{{ $course->code . " (".$course->title .')' }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4" id="faculty-course" style="display: none">
                                <label class="form-label" for="example-select">Faculty</label>
                                <select class="form-select" id="example-select" name="faculty-course">
                                    <option selected>select faculty</option>
                                    @foreach($info['faculty'] as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>

                                @if($errors->any('faculty-course'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('faculty-course') }}</p>
                                @endif
                            </div>
                            <div class="mb-4" id="dept-course" style="display: none">
                                <label class="form-label" for="example-select">Department</label>
                                <select class="form-select" id="example-select" name="dept_course">
                                    <option selected>select department</option>
                                    @foreach($info['department'] as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                    @endforeach
                                </select>

                                @if($errors->any('dept-course'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('dept-course') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="no-courses-exam">Max. number of courses per exam time<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="no-courses-exam" name="session" value="{{ old('no-courses-exam') ?? 4 }}">

                                @if($errors->any('no-courses-exam'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('no-courses-exam') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Begin with general courses ?</label>
                                <div class="space-y-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="example-radios-default1" name="gen-course-first" value="Yes" checked="">
                                        <label class="form-check-label" for="example-radios-default1">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="example-radios-default2" name="gen-course-first" value="No">
                                        <label class="form-check-label" for="example-radios-default2">No</label>
                                    </div>
                                </div>

                                @if($errors->any('gen-course-first'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('gen-course-first') }}</p>
                                @endif
                            </div>


                        </div>
                    </div>

                    <h2 class="content-heading border-bottom mb-4 pb-2">Time SLOTs</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Time slot describes the time interval which represents the duration of a particular exam or set of exams
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label">Time Slots</label>
                                <div class="space-x-0">


                                    @foreach($info['timeSlot'] as $time)
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input venue" id="time-slots" type="checkbox" value="{{ $time->id }}" name="time-slots[]">
                                            <label class="form-check-label" for="time-slots">{{ $time->name }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->any('time-slots'))
                                        <p style="color: red; font-size: medium">{{ $errors->first('time-slots') }}</p>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END date -->

                    <h2 class="content-heading border-bottom mb-4 pb-2">Timetable Other Information</h2>
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Enter all other information for this timetable
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label" for="session">Session<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="session" name="session" value="{{ old('session') }}">

                                @if($errors->any('session'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('session') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="semester">Semester<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="semester" name="semester" value="{{ old('semester') }}">

                                @if($errors->any('semester'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('semester') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Exam Days</label>
                                <div class="space-x-0">

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input venue" id="all-days" type="checkbox" value="all-days" name="exam-days">
                                        <label class="form-check-label" for="all-days">All</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Monday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Monday</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Tuesday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Tuesday</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Wednesday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Wednesday</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Thursday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Thursday</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Friday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Friday</label>
                                    </div>

                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input days" id="exam-days" type="checkbox" value="Saturday" name="exam-days[]">
                                        <label class="form-check-label" for="exam-days">Saturday</label>
                                    </div>

                                    @if($errors->any('exam-days'))
                                        <p style="color: red; font-size: medium">{{ $errors->first('exam-days') }}</p>
                                    @endif

                                </div>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="instructions" name="instructions" style="height: 100px" placeholder="Enter instructions"></textarea>
                                <label for="instructions">Enter exam instructions here</label>

                                @if($errors->any('instructions'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('instructions') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="planning-officer">Timetable planning officer<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="planning-officer" name="planning-officer" value="{{ old('planning-officer') }}">

                                @if($errors->any('planning-officer'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('planning-officer') }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <!-- END date -->

                </div>
                    <!-- END Regular -->

                    <!-- Submit -->
                <div class="row items-push">
                    <div class="col-lg-7 offset-lg-4">
                           <button type="submit" class="btn btn-alt-primary">Save</button>
                    </div>
                </div>
                    <!-- END Submit -->
            </div>
        </form>
    </div>


</main>
<!-- END Main Container -->

<script>

    let allVenues = document.getElementById('all-venues');
    let examDays = document.getElementById('all-days');

    allVenues.addEventListener('change', () => {
        document.querySelectorAll('.venue').forEach((value) => value.checked = !!(allVenues.checked));
    });

    document.getElementById('faculty').addEventListener('change', (event) => {

        let target = event.target;

        let courses = document.getElementById('courses');
        let facultyCourses = document.getElementById('faculty-course');
        let departmentCourses = document.getElementById('dept-course');

        if(target.options[target.selectedIndex].value === "custom") {
            courses.style.display = 'block';
            facultyCourses.style.display = 'none';
            departmentCourses.style.display = 'none';
        }

        else if(target.options[target.selectedIndex].value === "faculty") {
            courses.style.display = 'none';
            facultyCourses.style.display = 'block';
            departmentCourses.style.display = 'none';
        }

        else if(target.options[target.selectedIndex].value === "department") {
            courses.style.display = 'none';
            facultyCourses.style.display = 'block';
            departmentCourses.style.display = 'block';
        }
        else {
            courses.style.display = 'none';
            facultyCourses.style.display = 'none';
            departmentCourses.style.display = 'none';
        }
    });

    examDays.addEventListener('change', () => {
        document.querySelectorAll('.days').forEach((value) => value.checked = !!(examDays.checked));
    });

</script>
