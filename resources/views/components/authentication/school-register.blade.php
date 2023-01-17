<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool" style="padding-top: 50px">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Register Your School
                        </p>
                        <h1 class="display-5 mb-5">Give it a trial!</h1>
                    </div>
                    <form action="{{ route('school.register.store') }}" method="POST">

                        @csrf

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="school-name" class="form-control" id="name" placeholder="Your school name here...">
                                    <label for="name">Name of School</label>
                                </div>

                                @if($errors->any('school-name'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('school-name') }}</p>
                                @endif
                            </div>

                            <p class="text-primary fw-semi-bold px-3 text-bg-dark">MAIN ADMINISTRATOR INFO</p>

                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="mail" placeholder="Fullname" value="{{ old('name') }}">
                                    <label for="mail">Your fullname</label>
                                </div>


                                @if($errors->any('name'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="mobile" placeholder="Email Address" value="{{ old('email') }}">
                                    <label for="mobile">Email Address</label>
                                </div>

                                @if($errors->any('email'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="mobile" placeholder="Password">
                                    <label for="mobile">Password</label>
                                </div>

                                @if($errors->any('password'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}" class="form-control" id="subject" placeholder="Confirm password">
                                    <label for="subject">Password confirm</label>
                                </div>

                                @if($errors->any('password_confirmation'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Now</button>
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
