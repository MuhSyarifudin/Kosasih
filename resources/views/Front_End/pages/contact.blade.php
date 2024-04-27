<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Contact Us Page</title>
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

<body class="bg-light">
    {{-- Header --}}
    @include('Front_End.partials.header')


    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark">
        </div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aliquam dignissimos nihil adipisci
            vero, iusto, molestiae aliquid dolorum reprehenderit earum excepturi mollitia modi atque! Distinctio
            dignissimos corrupti dolorum quia debitis!
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63181.75967471331!2d114.2923282359473!3d-8.21683331373828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15aeb98f842ab%3A0x4027a76e3530a90!2sBanyuwangi%2C%20Kec.%20Banyuwangi%2C%20Kabupaten%20Banyuwangi%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1686308519263!5m2!1sid!2sid"
                        width="600" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Address</h5>
                    <a href="https://goo.gl/maps/e7PYMbFq1ocVcfpC8" target="_blank"
                        class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt"></i> {{ $settings->location }}</a>
                    <h5 class="mt-4">Call us</h5>
                    <a href="Call: 081234567890" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> {{ $settings->phone }}</a>
                    <br>
                    <a href="Call: 081234567890" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-whatsapp"></i> {{ $settings->whatsapp }}</a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: ask.zhidanrh12@gmail.com"
                        class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-at-fill"></i> {{ $settings->email }}</a>

                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block mb-2 text-dark fs-5 me-2">
                        <i class="bi bi-instagram me-1"></i>{{ $settings->instagram }}</a>
                    <a href="#" class="d-inline-block mb-2 text-dark fs-5 me-2">
                        <i class="bi bi-twitter me-1"></i>{{ $settings->twitter }}</a>
                    <a href="#" class="d-inline-block mb-2 text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1">{{ $settings->facebook }}</i></a>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <h5 class="text-center">Send a Message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" name="name" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="text" name="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" name="subject" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" class="form-control shadow-none" rows="5"
                                style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3"><i class="bi bi-send"></i>
                            SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--  Footer  --}}
    @include('Front_End.partials.footer')

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerview: 1,
            },
            640: {
                slidesPerview: 1,
            },
            768: {
                slidesPerview: 2,
            },
            1024: {
                slidesPerview: 3,
            },
        }
    });
    </script>
</body>


</html>