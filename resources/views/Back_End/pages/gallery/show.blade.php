@extends('Back_End.app')

@section('title', 'Gallery Details')
@section('page', 'Gallery Details')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Gallery List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Gallery Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Tampilkan informasi detail galeri di sini -->
                        <p><strong>Homestay:</strong> {{ $gallery->homestay->nama }}</p>
                        <p><strong>Nama:</strong> {{ $gallery->nama }}</p>
                        <p><strong>URL:</strong> {{ $gallery->url }}</p>
                        <img src="{{ asset('storage/' . $gallery->url) }}" alt="Gallery Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection