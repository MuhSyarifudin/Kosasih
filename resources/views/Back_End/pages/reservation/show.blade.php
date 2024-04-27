@extends('Back_End.app')

@section('title', 'Show Reservation')
@section('page', 'Show Reservation')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('reservation.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Reservation List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reservation Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tambahkan tampilan sesuai dengan data reservasi, jika ada gambar bisa ditampilkan di sini -->
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{  $reservation->nama  }}</h2>
                        <p><strong>Homestay:</strong> {{ $reservation->homestay->nama }}</p>
                        <p><strong>Guest:</strong> @if ($reservation->guest)
                            {{ $reservation->guest->nama }}
                            @else
                            Guest not found
                            @endif</p>
                        <p><strong>Check-In Date:</strong> {{ $reservation->tanggal_checkin }}</p>
                        <p><strong>Check-Out Date:</strong> {{ $reservation->tanggal_checkout }}</p>
                        <p><strong>Number of Guests:</strong> {{ $reservation->jumlah_tamu }}</p>
                        <p><strong>Total Price:</strong> ${{ $reservation->total_harga }}</p>
                        <!-- Tambahkan informasi lainnya yang relevan dengan reservasi Anda -->
                        <a href="{{ route('reservation.edit', $reservation->id) }}"
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
