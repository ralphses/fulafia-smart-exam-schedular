<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool" style="padding-top: 50px">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="display-4 mb-4">Student Sign Up!!</h1>
                    </div>
                    <form action="{{ route('student.register.faculty') }}" method="POST">

                        @csrf

                        <div class="row g-3">

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" id="student-faculty" name="student-faculty">
                                        <option selected="">select option</option>
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
                                        <option selected="">select option</option>
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
                                        type="submit">Continue (Add Courses)</button>
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
