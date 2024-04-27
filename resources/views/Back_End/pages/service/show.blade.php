@extends('Back_End.app')

@section('title', 'Show Service')
@section('page', 'Show Service')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('service.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Service List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Service Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tampilkan gambar atau elemen visual lainnya jika diperlukan -->
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $service->nama }}</h2>
                        <p><strong>Homestay:</strong> {{ $service->homestay->nama }}</p>
                        <p><strong>Deskripsi:</strong> {{ $service->deskripsi }}</p>
                        <p><strong>Harga:</strong> {{ $service->harga }}</p>
                        <!-- Tambahkan informasi lainnya yang relevan dengan service Anda -->
                        <a href="{{ route('service.edit', $service->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
