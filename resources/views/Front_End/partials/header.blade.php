    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/">{{ $generalSettings->site_title }}</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-2" href="#" id="homestayDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Homestay
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homestayDropdown">
                            <!-- Tambahkan item-item dropdown di sini -->
                            @foreach ($regions ?? [] as $region)
                            <li><a class="dropdown-item" href="{{ route('regions.show', ['kota' => $region->kota]) }}">
                                    <i class="bi bi-geo-alt"></i> {{ $region->kota }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="/facilities">Facilities</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-2" href="#" id="aboutDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <!-- Tambahkan item-item dropdown di sini -->
                            <li><a class="dropdown-item" href="/about"><i class="bi bi-info-circle"></i> About</a></li>
                            <li><a class="dropdown-item" href="/contact"><i class="bi bi-envelope"></i> Contact</a></li>
                            <!-- Dan seterusnya... -->
                        </ul>
                    </li>
                    <!-- Tambahkan ini di luar navbar -->
                    @auth('tamu')
                    <!-- If authenticated, show the user image and a dropdown menu -->
                    <ul class="nav-item dropdown ms-md-5">
                        <a class="nav-link dropdown-toggle me-2" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-inline-block">Welcome, {{ auth('tamu')->user()->nama_tamu }}</span>
                            <img src="{{ asset('/storage/' . auth('tamu')->user()->foto_tamu) }}" alt="User Image"
                                class="rounded-circle" width="30">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <!-- Add user-specific dropdown items here -->
                            <li><a class="dropdown-item" href="/profile-guest"><i class="bi bi-person bi-lg"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="/chat-guest"><i class="bi bi-chat bi-lg"></i> Chat</a>
                            </li>
                            <li><a class="dropdown-item" href="/invoice"><i class="bi bi-receipt bi-lg"></i> Invoice</a>
                            </li>
                            <li><a class="dropdown-item" href="/review-guest"><i class="bi bi-yelp bi-lg"></i>
                                    Reviews</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('tamu.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right bi-lg"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </ul>
                    @else
                    <!-- If not authenticated, show the Register button -->
                    <ul class="nav-item ml-4">
                        <button type="button" class="btn bg-custom text-white me-5" data-bs-toggle="modal"
                            data-bs-target="#registerModal">
                            Register
                        </button>
                    </ul>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>



    <!-- Modal Register -->
    @include('Front_End.Auth.modal-register')


    <!-- Modal Login -->
    @include('Front_End.Auth.modal-login')



    <style>
/* Add this CSS to position the Register button to the right */
.navbar-nav.register-button {
    margin-left: auto;
}

/* Style for the circular user image */
.navbar-nav .rounded-circle {
    margin-left: 5px;
    /* Adjust margin as needed */
}

/* Ensure dropdown menu items have proper styling */
.dropdown-menu {
    min-width: 150px;
    /* Adjust the minimum width as needed */
}

.dropdown-item {
    color: #333;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #333;
}

/* Divider styling */
.divider {
    height: 1px;
    margin: 0.5rem 0;
    overflow: hidden;
    background-color: #e9ecef;
}

/* Responsive styles for tablets and phones */
@media (max-width: 991px) {
    .navbar {
        position: sticky;
        top: 0;
    }

    .navbar.sticky {
        background-color: #fff;
        /* Adjust as needed */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
}

/* CSS untuk dropdown menu Homestay */
.dropdown-menu {
    background-color: #fff;
    /* Warna latar belakang dropdown */
    border: none;
    /* Hilangkan border */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    /* Efek bayangan */
}

.dropdown-item {
    color: #333;
    /* Warna teks item dropdown */
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    /* Warna latar belakang saat hover */
    color: #333;
    /* Warna teks saat hover */
}


/* Mengubah warna tombol dropdown jika ada notifikasi */
.has-notification .nav-link.dropdown-toggle::after {
    content: "\f0f3";
    /* U
        nicode untuk icon notifikasi (misalnya: ikon lonceng) */
    font-family: 'Font Awesome 5 Free';
    /* Font
        untuk ikon */
    font-weight: 900;
    font-size: 18px;
    color: #ff0000;
    /* Warna ikon notifikasi */
}

/* Add your custom styles here */

/* Ensure modals don't overlap */
.modal {
    z-index: 1050;
    /* Adjust the z-index as needed */
}



/* Optional: Add some styling for links in the modals */
.modal-body a {
    color: #007bff;
}



/* Optional:
 Add some st
yling for form labels */
.modal-body label {
    font-weight: bold;

}
    </style>