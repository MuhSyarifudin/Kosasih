<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REVIEWS</h2>
<div class="container">
    <div id="carouselTestimonials" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($reviews->chunk(3) as $key => $chunk)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <div class="row">
                    @foreach ($chunk as $review)
                    <div class="col-md-4">
                        <div class="card mx-auto" style="width: 300px;">
                            <!-- Atur lebar kartu sesuai kebutuhan -->
                            <div class="card-body d-flex flex-column ">
                                <div class="d-flex justify-content-start mb-1">
                                    <img src="{{ asset('storage/' . $review->tamu->foto_tamu) }}" width="30px"
                                        height="30px" class="rounded-circle me-2" alt="Tamu Avatar">
                                    <h6 class="card-title m-0">{{ $review->tamu->nama_tamu }}</h6>
                                </div>
                                <div class="rating mb-2">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="bi bi-star-fill text-warning" style="font-size: 15px;"></i>
                                        @endfor
                                </div>
                                @if ($review->gallery)
                                <!-- Gunakan max-width dan max-height untuk mengontrol ukuran foto review -->
                                <img src="{{ asset('storage/' . $review->gallery->image_path) }}"
                                    class="card-img-top zoomable-image mb-2" alt="Review Photo">
                                @endif
                                <!-- Tambahkan elemen untuk menampilkan gambar -->
                                <p class=" text-center">{{ $review->ulasan }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <!-- Tambahkan carousel-item berikutnya di sini -->
        </div>
        <button class=" carousel-control-prev" type="button" data-bs-target="#carouselTestimonials"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<style>
/* Efek animasi ketika kursor diarahkan ke kartu */
.card:hover {
    transform: translateY(-10px);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Menggeser rating ke tengah */
.rating {
    display: flex;
    margin-left: 40px;
}

/* Gaya tambahan untuk gambar ulasan */
.zoomable-image {
    width: 30%;
    margin-left: 40px;
    /* Menengahkan gambar */
    height: auto;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.zoomable-image:hover {
    transform: scale(1.2);

    /* Ubah faktor sesuai kebutuhan */
}
</style>
