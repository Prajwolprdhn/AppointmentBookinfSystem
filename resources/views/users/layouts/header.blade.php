<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid sticky-top" style="background-color: rgb(19, 99, 198);">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="index.html" class="navbar-brand">
                <h3 class="text-white">Appointment Booking System</h3>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('main') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('doctors') }}" class="nav-item nav-link">Doctors</a>
                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
