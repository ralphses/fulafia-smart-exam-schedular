<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool" style="padding-top: 50px">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="display-4 mb-4">Student Sign Up!!</h1>
                    </div>
                    <form action="{{ route('student.register.store') }}" method="POST">

                        @csrf

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="student-name" value="{{ old('student-name') }}" class="form-control" id="student-name" placeholder="Your full name here...">
                                    <label for="student-name">Full Name</label>
                                </div>

                                @if($errors->any('student-name'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-name') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" name="student-email" value="{{ old('student-email') }}" class="form-control" id="student-email" placeholder="Your Email address here...">
                                    <label for="student-email">Email Address</label>
                                </div>

                                @if($errors->any('student-email'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-email') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" name="student-matric" value="{{ old('student-matric') }}" class="form-control" id="student-matric" placeholder="Your matriculation here...">
                                    <label for="student-matric">Matriculation Number</label>
                                </div>

                                @if($errors->any('student-matric'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-matric') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select" id="student-school" name="student-school">
                                        <option selected>select..</option>
                                        <option value="">Federal University of Lafia</option>
                                    </select>
                                    <label for="student-school">Select School</label>
                                </div>

                                @if($errors->any('student-school'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-school') }}</p>

                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="student-faculty" name="student-level">
                                        <option selected>select level..</option>
                                        <option value="100 Level">100 Level</option>
                                        <option value="200 Level">200 Level</option>
                                        <option value="300 Level">300 Level</option>
                                        <option value="400 Level">400 Level</option>
                                        <option value="500 Level">500 Level</option>
                                        <option value="600 Level">600 Level</option>
                                        <option value="600 Level">700 Level</option>
                                    </select>
                                    <label for="student-faculty">Current Level</label>
                                </div>

                                @if($errors->any('student-level'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-level') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="student-department" name="student-department">Department                                        <option selected>select..</option>
                                        <option value="">Science</option>
                                    </select>
                                    <label for="student-department">Department</label>
                                </div>

                                @if($errors->any('student-department'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-department') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="student-faculty" name="student-faculty">
                                        <option selected>select..</option>
                                        <option value="">Science</option>
                                    </select>
                                    <label for="student-faculty">Faculty</label>
                                </div>

                                @if($errors->any('student-faculty'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-faculty') }}</p>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" name="student-fees" value="{{ old('student-fees') }}" class="form-control" id="student-fees" placeholder="Your matriculation here...">
                                    <label for="student-fees">School fees receipt no.</label>
                                </div>

                                @if($errors->any('student-fees'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('student-fees') }}</p>
                                @endif

                            </div>

                            <div style="display: {{ session('student_reg_start') ? "block" : "none" }}">
                                <h5 class="content-baseline border-bottom mb-2 pb-2">SELECT COURSES</h5>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Course 1</label>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Sign Up</button>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a>
                                <p>Have account? Login <a class="" href="{{ route('login') }}">here</a></p>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Callback End -->
