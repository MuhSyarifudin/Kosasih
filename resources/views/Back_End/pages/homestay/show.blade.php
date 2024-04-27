@extends('Back_End.app')

@section('title', 'Show Homestay')
@section('page', 'Show Homestay')
@section('content')

<div class="col-md-12 mb-2 text-right">
    <a href="{{ route('homestay.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $homestay->nama  }}</h4>
            </div>
            <div class="text-right mt-2">
                <a href="{{ route('homestay.edit', $homestay->id) }}" class="btn btn-sm circular-button btn-primary">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $homestay->gambar) }}" alt="Homestay Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $homestay->nama  }}</h2>
                        <p><strong>Address:</strong> {{ $homestay->alamat }}</p>
                        <p><strong>Price Per Night:</strong> ${{ $homestay->harga_per_malam }}</p>
                        <p><strong>Description:</strong>{{ $homestay->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
