@extends('Back_End.app')

@section('title', 'Carousel')
@section('page', 'Carousel')
@section('content')


<div class="row">
    <div class="col-md-12 mb-2">
        <div class="float-end">
            <a href="{{ route('carousel.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-circle"></i> Add Carousel
            </a>
        </div>
    </div>

    @foreach($carouselItems as $carouselItem)
    <div class="col-md-3">
        <div class="card position-relative">
            <img src="{{ asset('storage/' . $carouselItem->gambar) }}" class="card-img-top"
                alt="{{ $carouselItem->nama }}">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $carouselItem->nama_carousel }}</h5>
                <p class="card-text text-center">{{ $carouselItem->deskripsi }}</p>
                <a href="{{ route('carousel.show', $carouselItem->id) }}"
                    class="btn btn-primary circular-button position-absolute top-0 start-0 m-2">
                    <i class="bi bi-eye"></i>
                </a>
                <form action="{{ route('carousel.destroy', $carouselItem->id) }}" method="POST"
                    class="position-absolute top-0 end-0 m-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger circular-button">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
.position-relative {
    position: relative;
    overflow: hidden;
}

.position-relative img {
    transition: transform 0.3s ease;
}

.position-relative:hover img {
    transform: scale(1.1);
}

.position-absolute {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.position-relative:hover .position-absolute {
    opacity: 1;
}

.circular-button {
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin: 5px;
    display: flex;
    align-items: center;
    justify-content: center;

}
</style>






@endsection
