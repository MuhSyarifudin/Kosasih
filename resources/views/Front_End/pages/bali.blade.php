<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | {{ $region->kota }} </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Fonts Google  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    {{-- Boostrap 5 Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- My Style | CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body class="bg-light">
    {{-- Header --}}
    @include('Front_End.partials.header')

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">{{ $region->kota }}</h2>
        <div class="h-line bg-dark">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <form action="{{ route('regions.show', ['kota' => $region->kota]) }}" method="GET">
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                    <label class="form-label" style="font-weight:500;">Check-in</label>
                                    <input type="date" class="form-control shadow-none mb-3" name="tanggal_checkin" value="{{ $checkInDate }}">
                                    <label class="form-label" style="font-weight:500;">Check-out</label>
                                    <input type="date" class="form-control shadow-none" name="tanggal_checkout" value="{{ $checkOutDate }}">
                                </div>
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                    @foreach($fasilitas as $facility)
                                    <div class="mb-2">
                                        <input type="checkbox" id="{{ $facility->id }}" class="form-check-input shadow-none me-1" name="fasilitas[]" value="{{ $facility->id }}" @if(in_array($facility->id,
                                        $selectedFacilities)) checked @endif>
                                        <label class="form-check-label" for="{{ $facility->id }}">
                                            {{ $facility->nama_fasilitas }}
                                        </label>
                                    </div>
                                    @endforeach
                                    <!-- Tambahkan fasilitas lainnya sesuai dengan homestay -->
                                </div>


                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-2" style="font-size: 18px;">Sort Price</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort_price" id="sortLowToHigh" value="asc" {{ request('sort_price') == 'asc' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sortLowToHigh">
                                            Low to High
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort_price" id="sortHighToLow" value="desc" {{ request('sort_price') == 'desc' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sortHighToLow">
                                            High to Low
                                        </label>
                                    </div>
                                </div>
                                <!-- Tambahkan tombol submit untuk mengirim form -->
                                <div class="text-center">
                                    <button type="submit" class="btn text-white custom-bg">Apply Filters</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                @if(count($homestays) > 0)
                @foreach($homestays as $homestay)
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="{{ asset('storage/' . $homestay->gambar) }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mt-2">{{ $homestay->nama }}</h5>
                            <div class="facilities mb-2">
                                <h6 class="mb-1">Facilities</h6>
                                @foreach($fasilitas as $facility)
                                @if($facility->homestay_id == $homestay->id)
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <img src="{{ asset('storage/' . $facility->gambar_fasilitas) }}" alt="Facility Image" class="facility-icon">
                                </span>
                                @endif
                                @endforeach
                            </div>
                            <div class="guest mb-3">
                                <h6 class="mb-1">Guest</h6>
                                @foreach($homestay->rooms as $room)
                                <div class="col-md-6">
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->kapasitas }}
                                        Guests</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="location">
                                <p class="mb-2"><i class="bi bi-geo-alt-fill"></i> {{ $homestay->alamat }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">$ {{ $homestay->harga_per_malam }}</h6>
                            @if($isAuthenticated)
                            <button type="button" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#bookNowModal" data-homestayid="{{ $homestay->id }}">
                                Book Now
                            </button>
                            @else
                            <!-- Display a message or redirect to login page -->
                            <p>Please login to book.</p>
                            @endauth

                            <button type="button" class="btn btn-sm w-100 btn-outline-info shadow-none" data-bs-toggle="modal" data-bs-target="#moreDetailsModal{{ $homestay->id }}">
                                More Details
                            </button>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            @else
            <!-- Tampilkan pesan jika tidak ada homestay yang memenuhi kriteria -->
            <div class="alert text-white custom-bg text-center" role="alert">
                Homestay not available based on your criteria.
            </div>
            @endif
        </div>
    </div>


    <!-- Modal More Details -->
    @foreach($homestays as $homestay)
    <div class="modal fade" id="moreDetailsModal{{ $homestay->id }}" tabindex="-1" aria-labelledby="moreDetailsModalLabel{{ $homestay->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Isi konten modal More Details di sini -->
                <div class="modal-header">
                    <h5 class="modal-title" id="moreDetailsModalLabel{{ $homestay->id }}">More Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Gambar dan deskripsi ruangan -->
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <!-- Tambahkan div carousel -->
                            <div id="roomImageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/images/rooms/1.jpg" class="d-block w-100" alt="Room Image 1">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p>Beautiful view from the room</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/images/rooms/2.png" class="d-block w-100" alt="Room Image 2">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p>Modern amenities for your comfort</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/images/rooms/3.png" class="d-block w-100" alt="Room Image 3">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p>Relax and unwind in our cozy room</p>
                                        </div>
                                    </div>
                                    <!-- Tambahkan gambar ruangan lainnya di sini -->
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#roomImageCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#roomImageCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            <!-- Rating bintang -->
                            <div class="rating mb-2">
                                <span class="text-muted">Rating:</span>
                                <span class="bi bi-star-fill text-warning"></span>
                                <span class="bi bi-star-fill text-warning"></span>
                                <span class="bi bi-star-fill text-warning"></span>
                                <span class="bi bi-star-fill text-warning"></span>
                                <span class="bi bi-star-fill text-warning"></span>
                                <span class="ms-1">/ 5.0</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="lead">{{ $homestay->nama }}</p>
                            <p>{{ $homestay->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Fasilitas ruangan -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="facilities mb-2">
                                <h6 class="mb-2">Facilities</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach($fasilitas as $facility)
                                        @if($facility->homestay_id == $homestay->id)
                                        <span class="badge rounded-pill bg-light text-dark text-wrap"><img src="{{ asset('storage/' . $facility->gambar_fasilitas) }}" alt="Facility Image" class="facility-icon"></span>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom baru untuk Guest Capacity -->

                        <div class="col-md-6">
                            <h6 class="mb-1">Guest Capacity</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach($homestay->rooms as $room)
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->kapasitas }}
                                        Guest
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir dari kolom baru untuk Guest Capacity -->

                    <div class="row mt-4">
                        <!-- Tags -->
                        <div class="col-md-6">
                            <h6 class="mb-2">Tags</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <i class="bi bi-star-fill"></i> Luxury
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <i class="bi bi-heart-fill"></i> Comfort
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <i class="bi bi-sun-fill"></i> Getaway
                            </span>
                            <!-- Tambahkan tag lainnya di sini -->
                        </div>


                        <!-- Lokasi -->
                        <div class="col-md-6">
                            <h6 class="mb-3">Location</h6>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                <a href="https://maps.google.com/?q=123+Main+St,+Downtown" target="_blank">123 Main
                                    St,
                                    Downtown</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif

    @foreach($homestays as $homestay)
    <!-- Modal Book Now -->
    <div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mt-2">
            <div class="modal-content">
                <!-- Isi konten modal book now di sini -->
                <div class="modal-header custom-bg shadow-none text-white">
                    <h5 class="modal-title" id="bookNowModalLabel">Book Now</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form atau konten modal book now -->
                    <form action="{{ route('booking.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="homestay_id" value="{{ $homestay->id }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="tanggal_checkin" value="{{ $checkInDate }}">
                        <input type="hidden" name="tanggal_checkout" value="{{ $checkOutDate }}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_checkin" class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" id="tanggal_checkin" name="tanggal_checkin" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_checkout" class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" id="tanggal_checkout" name="tanggal_checkout" required>
                            </div>
                        </div>

                        <!-- Tipe Kamar (Room Type) -->
                        <div class="row">
                            <!-- Jumlah Tamu -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="jumlah_tamu" class="form-label">Capacity of Guests</label>
                                    <input type="number" class="form-control" id="jumlah_tamu" name="jumlah_tamu" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn custom-bg shadow-none text-white w-100">Submit Booking</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Footer  --}}
        @include('Front_End.partials.footer')

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</body>

<style>
    /* Custom CSS for room image carousel */
    #roomImageCarousel {
        max-width: 600px;
        /* Sesuaikan lebar maksimal sesuai kebutuhan */
        margin: auto;
        /* Pusatkan carousel di tengah halaman */
    }

    #roomImageCarousel img {
        max-width: 100%;
        /* Gambar akan menyesuaikan lebar carousel */
        height: auto;
        /* Tetap menjaga aspek rasio gambar */
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        /* Atur lebar tombol prev/next sesuai kebutuhan */
    }

    .carousel-inner {
        border-radius: 10px;
        /* Atur radius sudut carousel */
        overflow: hidden;
        /* Sembunyikan gambar yang melebihi carousel */
    }

    .carousel-item {
        text-align: center;
        /* Pusatkan gambar di dalam carousel */
    }

    /* Custom CSS for facilities icons */
    .facilities .badge {
        font-size: 1rem;
        /* Sesuaikan ukuran ikon sesuai kebutuhan */
        margin-right: 5px;
        /* Sesuaikan margin antara ikon */
        margin-bottom: 5px;
        /* Sesuaikan margin antara ikon */
        display: inline-flex;
        align-items: center;
    }

    .facilities .badge img {
        max-width: 20px;
        /* Sesuaikan lebar maksimal ikon */
        max-height: 20px;
        /* Sesuaikan tinggi maksimal ikon */
        margin-right: 5px;
        /* Sesuaikan margin antara ikon */
    }

    /* Custom CSS for Sort Price slider animation */
    #priceRange::-webkit-slider-thumb {
        transition: transform 0.3s ease-in-out;
    }

    #priceRange::-moz-range-thumb {
        transition: transform 0.3s ease-in-out;
    }





    #priceRange::-ms-thumb {
        transition: transform 0.3s ease-in-out;
    }



    #priceRange::-webkit-slider-thumb:active {
        transform: scale(1.2);
    }

    #priceRange::-moz-range-thumb:active {
        transform: scale(1.2);
    }

    #priceRange::-ms-thumb:active {
        transform: scale(1.2);
    }
</style>








</html>