<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        </p>
                        <h1 class="display-5 mb-5">School Register</h1>
                    </div>
                    <form action="" method="POST">

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <label for="name">Name of School</label>
                                    <input type="text" name="school-name" class="form-control" id="name" placeholder="Your school name here...">
                                </div>
                            </div>

                            <p class="text-primary fw-semi-bold px-3 text-bg-dark">MAIN ADMINISTRATOR INFO</p>

                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="admin-fullname" class="form-control" id="mail" placeholder="Fullname">
                                    <label for="mail">Your fullname</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="email" name="admin-email" class="form-control" id="mobile" placeholder="Email Address">
                                    <label for="mobile">Email Address</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" name="admin-password" class="form-control" id="mobile" placeholder="Password">
                                    <label for="mobile">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" name="admin-password-confirmation" class="form-control" id="subject" placeholder="Confirm password">
                                    <label for="subject">Password confirm</label>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Now</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="" href="/"><i class="bi bi-arrow-left-square-fill"></i> Back Home</a>
                            <p>Have account? Login <a class="" href="{{ route('login') }}">here</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Callback End -->
