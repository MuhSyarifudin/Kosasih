@extends('Back_End.app')

@section('title', 'Add Reservation')
@section('page', 'Add Reservation')
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
                <h4 class="card-title">Add New Reservation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-select @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    <option value="">Select Homestay</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Room</label>
                                <select class="form-select @error('room_id') is-invalid @enderror" id=" room_id"
                                    name="room_id" required>
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->nama }}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_id" class="form-label">Guest</label>
                                <select class="form-select @error('guest_id') is-invalid @enderror" id="guest_id"
                                    name="guest_id" required>
                                    <option value="">Select Number Of Guest</option>
                                    @foreach($guests as $guest)
                                    <option value="{{ $guest->id }}">{{ $guest->nama_tamu }}</option>
                                    @endforeach
                                </select>
                                @error('guest_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_tamu" class="form-label">Capacity of Guests</label>
                                <input type="number" class="form-control @error('jumlah_tamu') is-invalid @enderror"
                                    id="jumlah_tamu" name="jumlah_tamu" min="1" required>
                                @error('jumlah_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_checkin" class="form-label">Check-In Date</label>
                                <input type="date" class="form-control @error('tanggal_checkin') is-invalid @enderror"
                                    id="tanggal_checkin" name="tanggal_checkin" required>
                                @error('tanggal_checkin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_checkout" class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control @error('tanggal_checkout') is-invalid @enderror"
                                    id="tanggal_checkout" name="tanggal_checkout" required>
                                @error('tanggal_checkout')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Price</label>
                                <input type="number" class="form-control @error('total_harga') is-invalid @enderror"
                                    id="total_harga" name="total_harga" required>
                                @error('total_harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('reservation.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









@endsection
