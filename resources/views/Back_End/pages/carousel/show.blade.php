@extends('Back_End.app')

@section('title', 'Show Carousel')
@section('page', 'Show Carousel')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('carousel.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Carousel List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Carousel Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $carouselItem->gambar) }}" alt="Carousel Image"
                            class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $carouselItem->nama_carousel }}</h2>
                        <p><strong>Description:</strong> {{ $carouselItem->deskripsi }}</p>
                        <!-- <a href="{{ route('carousel.edit', $carouselItem->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection