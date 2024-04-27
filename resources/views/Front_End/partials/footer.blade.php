<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">{{ $generalSettings->site_title }}</h3>
            <p>
                {{ $generalSettings->site_about }}
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contact</a> <br>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">About</a> <br>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-white text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>
                    {{ $settings->instagram }}</span>
            </a>
            <br>
            <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-white text-dark fs-6 p-2"><i class="bi bi-twitter me-1"></i>
                    {{ $settings->twitter }}</span>
            </a>
            <br>
            <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-white text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i></i>
                    {{ $settings->facebook }}</span>
            </a>
            <br>
        </div>
    </div>
</div>
<h6 class="text-center  text-dark p-3 ">Designed and Developed by {{ $generalSettings->site_title }}</h6>