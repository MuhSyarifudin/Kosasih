<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Review Guests</title>
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

    /* Add this CSS for star rating */
    .star-rating-container {
        font-size: 24px;
        cursor: pointer;
        color: #ccc;
        display: inline-block;
    }

    .star-rating-container:hover .star-rating,
    .star-rating-container:hover .star-rating:checked~label {
        color: #ffcc00;
        /* Change to yellow color */
    }

    .star-rating {
        display: none;
    }

    .star-label {
        display: inline-block;
        padding: 5px;
        color: #ffcc00;
        /* Change to your desired star color */
    }



    /* Add more styles as needed for tablets */
    @media (max-width: 768px) {
        .profile-info {
            flex-direction: column;
            align-items: center;
        }

        .pull-left {
            text-align: center;
        }

        .star-rating-container {
            font-size: 20px;
        }
    }

    /* Add more styles as needed for mobile phones */
    @media (max-width: 480px) {
        .h-font {
            font-size: 1.5rem;
        }

        .star-rating-container {
            font-size: 16px;
        }
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
                @foreach($reviews->take(2) as $review)
                @if($review->tamu_id == Auth::guard('tamu')->user()->id)
                <h2 class="fw-bold h-font">Review</h2>
                <div class="h-line bg-dark"></div>
                <div class="pull-left mt-3">

                    @if ($review->reviewGallery)
                    <img src="{{ asset('storage/' . $review->reviewGallery->image_path) }}" class="img-fluid mb-3"
                        alt="Review Image">
                    @endif
                    <p class="text-center">Ulasan: {{ $review->ulasan }}</p>
                    <p class="text-center">Rating:
                    <div class="star-rating-container">
                        @for($i = 1; $i <= $review->rating; $i++)
                            <label class="star-label">&#9733;</label>
                            @endfor
                    </div>
                    </p>
                </div>
                @endif
                @endforeach
            </div>
            <div class="card">
                <div class="card-header">
                    Make Reviews
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('submit.review') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="homestay_id" class="form-label">Select Homestay</label>
                        <select class="form-control" id="homestay_id" name="homestay_id">
                            <option value="">Select a Homestay</option>
                            @foreach($homestays as $homestay)
                            <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                            @endforeach
                        </select>
                        <label for="ulasan" class="form-label">Write a Review</label>
                        <textarea class="form-control" id="ulasan" name="ulasan" rows="4"></textarea>
                        <div class="form-group mt-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-control" id="rating" name="rating">
                                <option value="">Select of Rating</option>
                                <option value="1">&#9733;</option>
                                <option value="2">&#9733;&#9733;</option>
                                <option value="3">&#9733;&#9733;&#9733;</option>
                                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                            </select>
                        </div>
                        <label for="gallery_image" class="form-label mt-3">Upload Image</label>
                        <input type="file" class="form-control" id="gallery_image" name="gallery_image">

                        <div class="text-center">
                            <button type="submit" class="btn btn-dark mt-3">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer  --}}
    @include('Front_End.partials.footer')

    <script>
    // Add this script for updating the selected rating
    document.addEventListener('DOMContentLoaded', function() {
        const ratingSelect = document.getElementById('rating');
        const selectedRatingSpan = document.getElementById('selected-rating');

        ratingSelect.addEventListener('change', function() {
            // Display the selected rating
            selectedRatingSpan.innerText = this.value;
        });
    });
    </script>

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
