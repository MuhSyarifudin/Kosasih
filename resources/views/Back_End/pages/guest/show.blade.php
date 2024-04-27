@extends('Back_End.app')

@section('title', 'Show Guest')
@section('page', 'Show Guest')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('guest.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Guest List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Guest Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tambahkan gambar guest jika ada -->
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $guest->nama_tamu }}</h2>
                        <p><strong>Email:</strong> {{ $guest->email_tamu }}</p>
                        <p><strong>File:</strong> {{ $guest->file_tamu }}</p>
                        <a href="{{ route('guest.edit', $guest->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
