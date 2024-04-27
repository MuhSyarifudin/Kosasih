@extends('Back_End.app')

@section('title', 'Dashboard')
@section('page', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-3 bg-primary text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Guests</h5>
                    <i class="bi bi-person-fill fs-2 icon-animate"></i> <!-- Ikon untuk Total Guests -->
                </div>
                <p class="card-text">{{ count(\App\Models\Tamu::all()) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 bg-success text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Rooms</h5>
                    <i class="bi bi-door-open-fill fs-2 icon-animate"></i> <!-- Ikon untuk Total Rooms -->
                </div>
                <p class="card-text">{{ count(\App\Models\Rooms::all()) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 bg-info text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Reservations</h5>
                    <i class="bi bi-calendar-check-fill fs-2 icon-animate"></i> <!-- Ikon untuk Total Reservations -->
                </div>
                <p class="card-text">{{ count(\App\Models\Pemesanan::all()) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 bg-warning text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Homestays</h5>
                    <i class="bi bi-geo-fill fs-2 icon-animate"></i> <!-- Ikon untuk Total Homestays -->
                </div>
                <p class="card-text">{{ count(\App\Models\Homestay::all()) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 bg-danger text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Pendapatan</h5>
                    <i class="bi bi-currency-dollar fs-2 icon-animate"></i>
                    <!-- Ikon untuk Total Pendapatan dari Reservasi -->
                </div>
                <p>$. {{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4 bg-secondary text-white hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Total Payment Pending</h5>
                    <i class="bi bi-x-octagon-fill fs-2 icon-animate"></i> <!-- Ikon untuk Total Pendings -->
                </div>
                <p class="card-text">$. {{ number_format($totalPaymentPending, 2) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 hover-card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-calendar-check-fill fs-4 me-2"></i>Recent Reservations
                </h5>
                <ul class="list-group">
                    @foreach($recentReservations as $reservation)
                    <li class="list-group-item">
                        Reservation {{ $reservation->id }} - Homestay {{ $reservation->homestay_id }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4 hover-card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-clock-fill fs-4 me-2"></i>Upcoming Check-Ins
                </h5>
                <ul class="list-group">
                    @foreach($upcomingCheckins as $checkin)
                    <li class="list-group-item">
                        Guest {{ $checkin->tamu_id }} - room {{ $checkin->id }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Reservations Analytics -->
@include('Back_End.pages.dashboard.reservations_analytics')

<style>
/* CSS untuk card */
.card {
    transition: transform 0.2s ease-in-out;
}

/* CSS untuk card saat dihover */
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.icon-animate {
    transition: transform 0.2s ease-in-out, color 0.2s ease-in-out;
}

.icon-animate:hover {
    transform: scale(1.2);
    /* Ubah ukuran ikon saat dihover */
    color: #ff5733;
    /* Ubah warna ikon saat dihover */
}
</style>



@endsection