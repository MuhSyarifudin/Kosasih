@extends('Back_End.app')

@section('title', 'Settings')
@section('page', 'Settings')
@section('content')
<div class="card" style="width: 60rem;">
    <div class="card-body">
        <!-- Button Edit modal -->
        <button type="button" class="btn btn-dark shadow-none btn-sm pull-right" data-bs-toggle="modal"
            data-bs-target="#generalModal">
            <i class="bi bi-pencil-square"></i>
            Edit
        </button>
        <br>
        <h5 class="card-title mb-3"><strong>General Settings</strong></h5>
        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
        <p class="card-text">{{ $generalSettings->site_title }}</p>
        <h6 class="card-subtitle mb-1 fw-bold">Site About</h6>
        <p class="card-text">{{ $generalSettings->site_about }}</p>
    </div>
</div>


<div class="card mt-2" style="width: 60rem;">
    <div class="card-body">
        <!-- Button Edit modal -->
        <button type="button" class="btn btn-dark shadow-none btn-sm pull-right" data-bs-toggle="modal"
            data-bs-target="#settingModal">
            <i class="bi bi-pencil-square"></i>
            Edit
        </button>
        <br>
        <div class="zhidan row mb-3">
            <h5 class="mb-3"><strong>Settings</strong></h5>
            <div class="col-md-3">
                <h5 class="card-title mb-3"><strong> Contact Settings</strong></h5>
                <h6 class="card-subtitle mb-3 fw-bold"><i class="bi bi-telephone-fill"></i>
                    {{ $settings->phone }}</h6>
                <h6 class="card-subtitle mb-3 fw-bold"><i class="bi bi-whatsapp"></i> {{ $settings->whatsapp }}
                </h6>
                <p class="card-subtitle mb-3 fw-bold"><i class="bi bi-envelope-at-fill"></i>
                    {{ $settings->email }}</p>
            </div>

            <div class="col-md-3 ml-5">
                <h5 class="card-title mb-3"><strong> Follow Us</strong></h5>
                <h6 class="card-subtitle mb-3 fw-bold"><i class="bi bi-instagram"></i> {{ $settings->instagram }}</h6>
                <h6 class="card-subtitle mb-3 fw-bold"><i class="bi bi-twitter"></i> {{ $settings->twitter }}</h6>
                <h6 class="card-subtitle mb-3 fw-bold"><i class="bi bi-facebook"></i> {{ $settings->facebook }}</h6>
            </div>
            <div class="col-md-3">
                <h5 class="card-title mb-3"><strong>Location</strong></h5>
                <p class="card-subtitle mb-3 fw-bold"><i class="bi bi-geo-alt-fill"></i> {{ $settings->location }}</p>
                <!-- Google Maps iframe -->
                <div class="embed-responsive" style="width: 300px; height: 150px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7898.074480515758!2d114.371496!3d-8.19900305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd1451848fbf10d%3A0xbd10eae13090fa59!2sSingotrunan%2C%20Kec.%20Banyuwangi%2C%20Kabupaten%20Banyuwangi%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1703203975670!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Shutdown Mode Website -->
<div class="card mt-2" style="width: 60rem;">
    <div class="card-body text-center">
        <!-- Button Edit modal -->
        <br>
        <h5 class="card-title mb-3"><strong> Shutdown Website </strong></h5>
        <p class="card-text mb-3">No customers will be allowed to book hotel room, when shutdown mode is turned on</p>

        <!-- Tombol Shutdown -->
        <form action="{{ route('toggleShutdown') }}" method="POST">
            @csrf
            <button type="submit"
                class="btn btn-{{ $maintenance && $maintenance->is_shutdown ? 'danger' : 'success' }}">
                {{ $maintenance && $maintenance->is_shutdown ? 'Nonaktifkan Shutdown Mode' : 'Aktifkan Shutdown Mode' }}
            </button>
        </form>
    </div>
</div>


<!-- Edit General Setting Modal -->
<div class="modal fade" id="generalModal" tabindex="-1" aria-labelledby="generalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="generalModalLabel"><i class="bi bi-gear-fill"></i> General Setting
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('setting.update', $generalSettings->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Isi formulir sesuai kebutuhan Anda, misalnya: -->
                    <div class="form-group">
                        <label for="site_title">Site Title</label>
                        <input type="text" name="site_title" id="site_title" class="form-control"
                            value="{{ $generalSettings->site_title }}">
                    </div>
                    <div class="form-group">
                        <label for="site_about">Site About</label>
                        <textarea name="site_about" id="site_about"
                            class="form-control">{{ $generalSettings->site_about }}</textarea>
                    </div>
                    <!-- Tombol "Save changes" ditempatkan di dalam formulir -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Setting Modal -->
<div class="modal fade" id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="settingModalLabel"><i class="bi bi-gear-fill"></i> Setting</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update-settings') }}">
                    @csrf
                    <!-- Phone Input Group -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-bold"><i class="bi bi-telephone-fill"></i>
                                Phone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ $settings->phone }}">
                            </div>
                        </div>
                        <!-- WhatsApp Input Group -->
                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label fw-bold"><i class="bi bi-whatsapp"></i>
                                WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                <input type="number" class="form-control" id="whatsapp" name="whatsapp"
                                    value="{{ $settings->whatsapp }}">
                            </div>
                        </div>
                    </div>
                    <!-- Email Input Group -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-bold"><i class="bi bi-envelope-fill"></i>
                                Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $settings->email }}">
                            </div>
                        </div>
                        <!-- Twitter Input Group -->
                        <div class="col-md-6">
                            <label for="twitter" class="form-label fw-bold"><i class="bi bi-twitter"></i>
                                Twitter</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    value="{{ $settings->twitter }}">
                            </div>
                        </div>
                    </div>
                    <!-- Facebook Input Group -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="facebook" class="form-label fw-bold"><i class="bi bi-facebook"></i>
                                Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ $settings->facebook }}">
                            </div>
                        </div>
                        <!-- Instagram Input Group -->
                        <div class="col-md-6">
                            <label for="instagram" class="form-label fw-bold"><i class="bi bi-instagram"></i>
                                Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ $settings->instagram }}">
                            </div>
                        </div>
                    </div>
                    <!-- Google Maps Input Group -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="googleMaps" class="form-label fw-bold"><i class="bi bi-geo-alt"></i> Google
                                Maps</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control" id="googleMaps" name="googleMaps"
                                    value="{{ $settings->google_maps_url }}">
                            </div>
                        </div>
                        <!-- Location Input Group -->
                        <div class="col-md-6">
                            <label for="location" class="form-label fw-bold"><i class="bi bi-geo-fill"></i>
                                Location</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-fill"></i></span>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $settings->location }}">
                            </div>
                        </div>
                    </div>
                    <div class="zhidan text-center">
                        <a href="{{ $settings->google_maps_url }}" class="btn btn-dark mt-2" target="_blank">Open
                            Map</a>
                    </div>
                    <!-- Map Display using iframe -->
                    <div class="mb-3">
                        <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0" src="{{ $settings->google_maps_url }}"></iframe>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-secondary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
document.getElementById('loadMapBtn').addEventListener('click', function() {
    var iframe = document.getElementById('googleMapFrame');
    iframe.src = "{{ $settings->google_maps_url }}";
});
</script>

@endsection