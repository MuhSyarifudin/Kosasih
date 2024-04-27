    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

    <div class="container">
        <div class="row">
            @foreach($rooms->take(3) as $room)
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <div class="price-container text-white">
                            <span class="currency">$</span>
                            <span class="amount">{{ $room->harga_per_malam }}</span>
                            <span class="per-night"> per night</span>
                        </div>
                    </div>
                    <img src="{{ asset('storage/' . $room->mainImage->main_image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="text-center justify-content-center">{{ $room->nama }}</h5>
                        <div class="guest text-center mb-2">
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Suitable for
                                {{ $room->kapasitas }} <i class="bi bi-person"></i>
                            </span>
                        </div>
                        <div class="rating mb-3 text-center justify-content-center" style="margin-left: -5px;">
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class=" text-center mb-1">Facilities</h6>
                            @foreach($room->homestay->fasilitas as $facility)
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <img src="{{ asset('storage/' . $facility->gambar_fasilitas) }}" alt="Facility Image"
                                    class="facility-icon">
                            </span>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-info shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if($rooms->count() > 3)
            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                    Rooms >>></a>
            </div>
            @endif
        </div>
    </div>


    <style>
.facility-icon {
    max-width: 20px;
    /* Adjust the max-width as needed */
    max-height: 20px;
    /* Adjust the max-height as needed */
    margin-right: 5px;
    /* Add s
ome spacing between the icon and text */
}
    </style>
