    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                @foreach($carouselItems as $carouselItem)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $carouselItem->gambar) }}" alt="{{ $carouselItem->nama_carousel }}"
                        class="w-100 d-block">
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <style>
/* Set height for the carousel container */
.swiper-container {
    height: 300px;
}

/* Ensure slides fill the height of the container */
.swiper-slide {
    height: 100%;
}

/* Style images to cover the slide */
.swiper-slide img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

/* Optional: Add some styles for pagination and navigation */
.swiper-pagination {
    position: absolute;
    bottom: 10px;
    right: 10px;
}

.swiper-button-next,
.swiper-button-prev {
    position: absolute;
    top: 50%;
    width: 30px;
    height: 30px;
    margin-top: -15px;
    background-color: #333;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.swiper-button-next {
    right: 10px;
}

.swiper-button-prev {
    left: 10px;
}


/* Media queries for responsive design */
@media (max-width: 768px) {
    .swiper-container {
        height: 200px;
    }
}

@media (max-width: 576px) {
    .swiper-container {
        height: 150px;
    }
}
    </style>

    <!-- Initialize Swiper -->
    <script>
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

    </script>