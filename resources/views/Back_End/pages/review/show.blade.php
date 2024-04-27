@extends('Back_End.app')

@section('title', 'Review Details')
@section('page', 'Review Details')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('review.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Reviews List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Review Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Tampilkan informasi detail review di sini -->
                        <p><strong>Homestay:</strong> {{ $review->homestay->nama }}</p>
                        <p><strong>Tamu:</strong> {{ $review->tamu->nama_tamu }}</p>
                        <p><strong>Rating:</strong> {{ $review->rating }}</p>
                        <p><strong>Ulasan:</strong> {{ $review->ulasan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
