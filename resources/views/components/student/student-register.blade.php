<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool" style="padding-top: 50px">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="display-4 mb-4">Student Sign Up!!</h1>
                    </div>
                    <form
                        @if(session('new-student-reg'))
                            action="{{ route('student.register.store.reg') }}"
                        @elseif(session('new-student'))
                            action="{{ route('student.register.store.faculty') }}"
                        @elseif(session('select-courses'))
                            action="{{ route('student.register.store.courses') }}"
                        @endif

                        method="POST">

                        @csrf

                        @if(session('new-student-reg'))

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="student-name" value="{{ old('student-name') }}"
                                           class="form-control" id="student-name"
                                           placeholder="Your full name here..." {{ session('student_reg_start') ? "readOnly" : "" }}>
                                    <label for="student-name">Full Name</label>
                                </div>

                                @if($errors->any('student-name'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-name') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" name="student-email" value="{{ old('student-email') }}"
                                           class="form-control" id="student-email"
                                           placeholder="Your Email address here..." {{ session('student_reg_start') ? "readOnly" : "" }} >
                                    <label for="student-email">Email Address</label>
                                </div>

                                @if($errors->any('student-email'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-email') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" name="student-matric" value="{{ old('student-matric') }}"
                                           class="form-control" id="student-matric"
                                           placeholder="Your matriculation here..." {{ session('student_reg_start') ? "readOnly" : "" }}>
                                    <label for="student-matric">Matriculation Number</label>
                                </div>

                                @if($errors->any('student-matric'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-matric') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select" id="student-school" name="student-school">
                                        <option selected
                                                value="{{ session('student_reg_start') ? $school->id : 0 }}">{{ session('student_reg_start') ? $school->name : 'select..' }}</option>
                                        @foreach($schools as $sch)
                                            <option value="{{ $sch->id }}">{{ $sch->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="student-school">Select School</label>
                                </div>

                                @if($errors->any('student-school'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-school') }}</p>

                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="student-level" name="student-level">
                                        <option value="">select level..</option>
                                        @foreach(\App\Utilities\Utility::LEVELS as $level)
                                            <option value="{{ $level }}">{{ $level }}</option>
                                        @endforeach

                                    </select>
                                    <label for="student-level">Current Level</label>
                                </div>

                                @if($errors->any('student-level'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-level') }}</p>
                                @endif

                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" name="student-fees" value="{{ old('student-fees') }}"
                                           class="form-control" id="student-fees"
                                           placeholder="Your matriculation here..." {{ session('student_reg_start') ? 'readOnly' : '' }}>
                                    <label for="student-fees">School fees receipt no.</label>
                                </div>

                                @if($errors->any('student-fees'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-fees') }}</p>
                                @endif

                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3"
                                        type="submit">{{ session('student_reg_start') ? "Sign Up" : "Get Started" }}</button>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a>
                                <p>Have account? Login <a class="" href="{{ route('login') }}">here</a></p>
                            </div>

                        </div>

                        @elseif(session('new-student'))

                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="student-faculty" name="student-faculty">
                                            <option selected>select option</option>
                                            @foreach($faculties as $faculty)
                                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="student-faculty">Faculty</label>
                                    </div>

                                    @if($errors->any('student-faculty'))
                                        <p style="color: red; font-size: medium">{{ $errors->first('student-faculty') }}</p>
                                    @endif

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="student-department" name="student-department">Department
                                            <option selected>select option</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="student-department">Department</label>
                                    </div>

                                    @if($errors->any('student-department'))
                                        <p style="color: red; font-size: medium">{{ $errors->first('student-department') }}</p>
                                    @endif
                                </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3"
                                        type="submit">{{ session('student_reg_start') ? "Sign Up" : "Proceed" }}</button>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a>
                                <p>Have account? Login <a class="" href="{{ route('login') }}">here</a></p>
                            </div>

                        </div>

                        @elseif('select-courses')

                            <div class="row g-3">

                                    <h5 class="content-baseline border-bottom mb-2 pb-2">SELECT COURSES</h5>
                                @if($errors->any('student-courses'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-courses') }}</p>
                                @endif
                                    <div class="d-flex flex-wrap">

                                        @foreach($courses->get() as $course)

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="student-courses[]"
                                                       value="{{ $course->id }}">
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckDefault">{{ $course->title }}</label>
                                            </div>

                                        @endforeach

                                    </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-100 py-3"
                                            type="submit">{{ session('student_reg_start') ? "Sign Up" : "Submit" }}</button>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a>
                                    <p>Have account? Login <a class="" href="{{ route('login') }}">here</a></p>
                                </div>

                            </div>
                        @endif

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Callback End -->

<!-- Button trigger modal -->
<button style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
