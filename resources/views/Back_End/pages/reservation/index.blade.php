@extends('Back_End.app')
@section('title', 'Reservation')
@section('page', 'Reservation')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Reservation berada di sebelah kiri -->
        <a href="{{ route('reservation.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Reservation
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('reservation.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Reservation..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Reservation -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Reservation</th>
                <th>Homestay</th>
                <th>Room</th>
                <th>Guest</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Capacity of Guests</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <!-- Isi tabel dengan data Reservation Anda -->
            <tr class="text-center">
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->homestay->nama }}</td>
                <td>{{ $reservation->room->nama }}</td>
                <td>
                    @if ($reservation->tamu)
                    {{ $reservation->tamu->nama_tamu }}
                    @else
                    Guest not found
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($reservation->tanggal_checkin)->format('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->tanggal_checkout)->format('d F Y') }}</td>
                <td>{{ $reservation->jumlah_tamu }}</td>
                <td>${{ $reservation->total_harga }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('reservation.edit', $reservation->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('reservation.show', $reservation->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this Reservation?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Reservation Anda -->
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $reservations->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>

</div>

<style>
/* Style for pagination links */
.pagination {
    display: flex;
    justify-content: center;
}

.pagination .page-item {
    margin: 0 5px;
}

.pagination .page-link {
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination .page-link:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
</style>




@endsection