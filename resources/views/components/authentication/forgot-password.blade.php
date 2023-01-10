<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h4 class="display-5 mb-5">Reset Password!</h4>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf
                        <div class="row g-3">

                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="mail" value="{{ old('email') }}">
                                    <label for="mail">Email Address</label>
                                </div>

                                @if($errors->any('email'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('email') }}</p>
                                @endif

                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Reset password</button>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <p><a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a></p>
                                <p>Already have account? Sign In or <a class="" href="{{ route('login') }}">here</a></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Callback End -->
