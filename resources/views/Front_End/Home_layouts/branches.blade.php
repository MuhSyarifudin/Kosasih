<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR PLACES</h2>

<div class="container">
    <div class="row">
        @foreach($homestays->take(3) as $homestay)
        <!-- Homestay Branch 1 -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <!-- Price Display -->
                <div class="position-absolute top-0 end-0 m-3">
                    <div class="price-container text-white">
                        <span class="currency">$</span>
                        <span class="amount">{{ $homestay->harga_per_malam}}</span>
                        <span class="per-night"> per night</span>
                    </div>
                </div>
                <img src="{{ asset('storage/' . $homestay->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold text-center">{{ $homestay->nama }}</h5>
                    <div class="guest text-center mb-2">
                        @foreach($rooms->where('homestay_id', $homestay->id) as $room)
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Suitable for {{ $room->kapasitas }} Adults
                        </span>
                        @endforeach
                        <!-- Add more guest details as needed -->
                    </div>
                    <div class="rating mb-3 text-center justify-content-center" style="margin-left: -5px;">
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <!-- Add more stars for rating as needed -->
                        </span>
                    </div>

                    <!-- Add more details here for this homestay -->
                    <div class="facilities mb-3">
                        <h6 class="text-center mb-1">Facilities</h6>
                        @foreach($fasilitas->where('homestay_id', $homestay->id) as $facility)
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            <img src="{{ asset('storage/' . $facility->gambar_fasilitas) }}" alt="Facility Image" class="facility-icon">
                        </span>
                        @endforeach
                        <!-- Add more facilities as needed -->
                    </div>
                    <div class="tags mb-4">
                        <i class="bi bi-tag-fill mb-2">Tag</i>
                        <!-- Address -->
                        @foreach($tags->where('homestay_id', $homestay->id) as $tag)
                        <!-- Nearby Places and Accessibility in meters -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $tag->nama_lokasi }}
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $tag->jarak }}
                                </span>
                            </div>
                        </div>
                        @endforeach

                        <div class="dropdown text-center">
                            <button class="btn btn-link text-decoration-none" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-geo-alt-fill"></i> Location Here
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: auto;  overflow: auto;">
                                <!-- QR Code container inside the dropdown menu -->
                                <div class="map-container text-center">
                                    <a href="https://maps.app.goo.gl/gCdHXf42iUmsunjU6" target="_blank">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://maps.app.goo.gl/gCdHXf42iUmsunjU6" alt="QR Code" style="width: 50%; height: auto; border-radius: 1px;">
                                    </a>
                                    <!-- Text "Click or Scan Here" -->
                                    <p class="click-scan-text">Click or Scan Here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-info shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($homestay->count() > 3)
    <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Explore More Homestays >>></a>
    </div>
    @endif
</div>





<style>
    /* Style for the dropdown link */
    .dropdown button {
        color: #007bff;
        cursor: pointer;
        text-decoration: underline;
    }

    /* Style for the dropdown container */
    /* Add the following style to adjust the dropdown menu */
    .dropdown-menu {
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        max-height: calc(150vh - 200px);
        /* Adjust the value as needed */
    }

    .price-container {
        background-color: #ff6b6b;
        /* Choose your desired background color */
        padding: 1px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .currency {
        font-size: 1em;

        margin-right: 5px;
    }

    .amount {
        font-size: 1em;
        font-weight: bold;
    }

    .per-night {
        font-size: 1em;
        margin-left: 5px;
    }


    .map-container {
        position: relative;
        overflow: hidden;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio */
        height: 0;
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Add styling for the Click or Scan Here text */
    .click-scan-text {
        font-size: 8px;
        /* Adjust the font size as needed */
        color: #333;
        /* Adjust the text color as needed */
    }
</style>