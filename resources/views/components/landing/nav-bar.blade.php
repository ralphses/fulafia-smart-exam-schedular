<!-- Navbar Start -->
<div class="container-fluid fixed-top wow fadeIn" data-wow-delay="0.1s" style="margin-top: 30px">

    <nav style="background-color: ghostwhite" class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="display-5 text-primary m-0"><img style="width: 90%" src="{{ asset('landing-assets/img/fulogo.png') }}" alt="Fulafia Logo"></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu border-light m-0">
                        <a href="{{ route('student.register') }}" class="dropdown-item">Student</a>
                        <a href="{{ route('school.register') }}" class="dropdown-item">School</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
