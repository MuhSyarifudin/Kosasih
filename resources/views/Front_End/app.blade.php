<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Home Page</title>
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

<body>
    {{-- Header --}}
    @include('Front_End.partials.header')

    {{-- Carousel --}}
    @include('Front_End.partials.carousel')

    {{-- Check Availability Form --}}
    @include('Front_End.Home_layouts.check')

    {{-- Our Places  --}}
    @include('Front_End.Home_layouts.branches')

    {{-- Our Rooms  --}}
    @include('Front_End.Home_layouts.rooms')

    {{-- Testimonials --}}
    @include('Front_End.Home_layouts.testimonials')

    {{-- Reach Us --}}
    @include('Front_End.Home_layouts.reach')

    {{-- Footer  --}}
    @include('Front_End.partials.footer')


    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
    });
    </script>

    <script>
    function decrementSliderValue() {
        document.getElementById('priceRange').stepDown(1000);
    }

    function incrementSliderValue() {
        document.getElementById('priceRange').stepUp(1000);
    }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eKwOjByhj5InLrROOQ1F5tFktISKJQTr2L/6D5jLXLWfG5eGc7SnhcKOy6lf5xj" crossorigin="anonymous">
    </script>




</body>



</html>
