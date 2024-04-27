@extends('Back_End.app')

@section('title', 'Edit Reservation')
@section('page', 'Edit Reservation')
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
                <h4 class="card-title">Edit Reservation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    <option value="" disabled>Select Homestay</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}"
                                        {{ $homestay->id == $reservation->homestay_id ? 'selected' : '' }}>
                                        {{ $homestay->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_id" class="form-label">Guest</label>
                                <select class="form-control @error('guest_id') is-invalid @enderror" id="guest_id"
                                    name="guest_id" required>
                                    <option value="" disabled>Select Guest</option>
                                    @foreach($guests as $guest)
                                    <option value="{{ $guest->id }}" @if($guest->id == $reservation->tamu_id)
                                        selected
                                        @endif>{{ $guest->nama_tamu }}</option>
                                    @endforeach
                                </select>
                                @error('guest_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_checkin" class="form-label">Check-In Date</label>
                                <input type="date" class="form-control @error('tanggal_checkin') is-invalid @enderror"
                                    id="tanggal_checkin" name="tanggal_checkin"
                                    value="{{ $reservation->tanggal_checkin }}" required>
                                @error('tanggal_checkin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_checkout" class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control @error('tanggal_checkout') is-invalid @enderror"
                                    id="tanggal_checkout" name="tanggal_checkout"
                                    value="{{ $reservation->tanggal_checkout }}" required>
                                @error('tanggal_checkout')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_tamu" class="form-label">Number of Guests</label>
                                <input type="text" class="form-control @error('jumlah_tamu') is-invalid @enderror"
                                    id="jumlah_tamu" name="jumlah_tamu" value="{{ $reservation->jumlah_tamu }}"
                                    required>
                                @error('jumlah_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Price</label>
                                <input type="number" class="form-control @error('total_harga') is-invalid @enderror"
                                    id="total_harga" name="total_harga" value="{{ $reservation->total_harga }}"
                                    required>
                                @error('total_harga')
                                <div class=" invalid-feedback">{{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('reservation.index') }}" class="btn btn-secondary mr-2">Cancel</a>

                <button type="submit" class="btn btn-danger">Update</button>

            </div>






            </form>
            </d iv>
        </div>
    </div>
</div>





@endsection
