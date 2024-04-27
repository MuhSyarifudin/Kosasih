<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Profile Guest</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Fonts Google  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    {{-- Boostrap 5 Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- My Style | CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <style>
    .box {
        border-top-color: var(--teal) !important;
    }

    body {
        background-color: #f8f9fa;
    }

    .profile-container {
        max-width: 800px;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 50px;
    }

    .profile-image {
        max-width: 200px;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .profile-info p {
        margin: 10px 0;
        font-size: 16px;
    }

    .form-label {
        font-weight: bold;
        margin-top: 10px;
    }

    .form-control {
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body class="bg-light">
    {{-- Header --}}
    @include('Front_End.partials.header')

    <div class="my-5 px-4 profile-container">
        <div class="profile-info d-flex justify-content-between mt-2">
            <div class="text-center">
                <h2 class="fw-bold h-font">Your Profile</h2>
                <div class="h-line bg-dark"></div>
                <div class="pull-left mt-3">
                    <img src="{{ asset('/storage/' . auth('tamu')->user()->foto_tamu) }}" alt="Your Profile Picture"
                        class="profile-image">
                    <p class="text-center">Name: {{ auth('tamu')->user()->nama_tamu }}</p>
                    <p class="text-center">Email: {{ auth('tamu')->user()->email_tamu }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Change Profile
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('tamu.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="Name" class="form-label">Change Name</label>
                        <input type="nama" class="form-control" id="nama_tamu" name="nama_tamu"
                            value="{{ auth('tamu')->user()->nama_tamu }}">
                        <label for="profileImage" class="form-label">Change Profile Picture</label>
                        <input type="file" class="form-control" id="foto_tamu" name="foto_tamu">
                        <label for="newPassword" class="form-label mt-3">Change Password</label>
                        <input type="password" class="form-control" id="password_tamu" name="password_tamu">
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark mt-3">Update
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer  --}}
    @include('Front_End.partials.footer')

    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            640: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 3
            },
            1024: {
                slidesPerView: 3
            },
        },
    });
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>


</html>