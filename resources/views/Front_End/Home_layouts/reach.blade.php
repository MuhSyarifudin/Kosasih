<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">EXPLORE OUR GALLERY</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-light rounded">
            <div class="gallery-container">
                @php $galleryLimit = 15; @endphp
                @foreach($galleries->take($galleryLimit) as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $gallery->url) }}" alt="{{ $gallery->title }}">
                    <h5>{{ $gallery->title }}</h5>
                    <p>{{ $gallery->description }}</p>
                </div>
                @endforeach

                @if(count($galleries) > $galleryLimit)
                <div class="explore-button-container text-center">
                    <a href="/gallery" class="btn btn-custom">
                        Explore More
                    </a>
                </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="bg-light p-4 rounded mb-4">
                <h5 class="text-center">Upcoming Events</h5>
                <p class="mb-2 text-dark">Check out our upcoming events and join us for memorable experiences.</p>
                <!-- Bootstrap Accordion -->
                @forelse($events as $event)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="eventHeader{{ $event->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#eventCollapse{{ $event->id }}" aria-expanded="true" aria-controls="eventCollapse{{ $event->id }}">
                            <img src="{{ asset('storage/' . $event->gambar_event) }}" alt="{{ $event->nama_event }}" class="avatar-img">
                            <div class="event-info">
                                <p class="mb-2">
                                    <i class="bi bi-calendar"></i> Date:
                                    {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                                </p>
                                <p class=" mb-0">{{ $event->nama_event }}</p>
                            </div>
                        </button>
                    </h2>
                    <div id="eventCollapse{{ $event->id }}" class="accordion-collapse collapse" aria-labelledby="eventHeader{{ $event->id }}" data-bs-parent="#eventAccordion">
                        <div class="accordion-body">
                            <!-- Latest Event Details -->
                            {{ $event->deskripsi }}
                        </div>
                    </div>
                </div>
                @empty
                <p>No upcoming events available.</p>
                @endforelse
            </div>

            <div class="bg-light p-4 rounded mb-4">
                <h5>All Events</h5>
                <div class="news-container">
                    <div class="news-item">
                        <img src="/images/news/news1.jpg" alt="News Image 1">
                        <h5 class="news-title">Exciting News Title 1</h5>
                        <p class="news-description">Short description of the exciting news. Add your details, links,
                            etc.</p>
                    </div>
                    <div class="news-item">
                        <img src="/images/news/news2.jpg" alt="News Image 2">
                        <h5 class="news-title">Breaking News Title 2</h5>
                        <p class="news-description">Brief description of the breaking news. Add your details, links,
                            etc.</p>
                    </div>
                    <div class="news-item">
                        <img src="/images/news/news3.jpg" alt="News Image 3">
                        <h5 class="news-title">Hot News Title 3</h5>
                        <p class="news-description">Concise description of the hot news. Add your details, links, etc.
                        </p>
                    </div>
                </div>
            </div>


            <div class="bg-light p-4 rounded mb-4">
                <h5>Call us</h5>
                <a href="Call: 081234567890" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> {{ $settings->phone }}</a>
                <br>
                <a href="Call: 081234567890" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-whatsapp"></i> {{ $settings->whatsapp }}</a>
                <br>
                <a href="DM: azhomestay1@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-envelope-at-fill"></i> {{ $settings->email }}</a>
            </div>
        </div>
    </div>
</div>


<style>
    .event-info p {
        font-size: 14px;
        /* Adjust the font size as needed */
    }

    .gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
    }

    .gallery-item {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    /* Add this CSS for custom styling */
    .text-custom {
        color: #00695c;
        /* Custom text color */
    }

    .btn-custom {
        background-color: #00695c;
        /* Custom button background color */
        border-color: #00695c;
        /* Custo
m button border color */
    }

    .btn-custom:hover {
        background-color: #004d40;
        /* Custom button background color on hover */
        border-color: #004d40;
        /* Custom button border color on hover */
    }

    .avatar-img {
        width: 100%;
        height: auto;
        max-width: 70px;
        /* Increase the maximum width for more spacing */
        border-radius: 50%;
        margin-right: 10px;
        /* Add margin to create space between the avatar and text */
    }


    .news-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .news-item {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .news-item img {
        width: 100%;
        height: auto;
        display: block;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .news-content {
        padding: 15px;
    }

    .news-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .news-description {
        font-size: 14px;
        color: #555;
        margin-bottom: 0;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 991px) {
        .col-lg-8 {
            order: 2;
            /* Ganti urutan kolom sesuai kebutuhan */
            margin-top: 20px;
            /* Ganti margin sesuai kebutuhan */
        }

        .col-lg-4 {
            order: 1;
            /* Ganti urutan kolom sesuai kebutuhan */
            margin-top: 20px;
            /* Ganti margin sesuai kebutuhan */
        }

        .card {
            width: 100%;
            margin-bottom: 20px;
        }

    }

    @media (max-width: 576px) {
        .card {

            width: 100%;
            margin-bottom: 20px;
        }

        .news-container {
            grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
        }

        .news-item {
            max-width: 100%;
        }




    }
</style>