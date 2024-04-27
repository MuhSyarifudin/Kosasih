@extends('Back_End.app')

@section('title', 'Event Details')
@section('page', 'Event Details')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('event.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Event List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Event Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Tampilkan informasi detail event di sini -->
                        <p><strong>Homestay:</strong> {{ $event->homestay->nama }}</p>
                        <p><strong>Nama:</strong> {{ $event->nama_event }}</p>
                        <p><strong>Tanggal Mulai:</strong> {{ $event->tanggal_mulai }}</p>
                        <p><strong>Tanggal Selesai:</strong> {{ $event->tanggal_selesai }}</p>
                        <p><strong>Deskripsi:</strong> {{ $event->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
