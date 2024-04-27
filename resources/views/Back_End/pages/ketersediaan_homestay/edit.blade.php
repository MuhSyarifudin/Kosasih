@extends('Back_End.app')

@section('title', 'Edit Availability Homestay')
@section('page', 'Edit Availability Homestay')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <a href="{{ route('availability-homestay.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('availability-homestay.update', $availability->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="room_id">Room:</label>
                <select class="form-control" id="room_id" name="room_id" required>
                    <option value="0">Select Options Rooms</option>
                    @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $availability->room_id ? 'selected' : '' }}>
                        {{ $room->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="homestay_id">Homestay:</label>
                <select class="form-control" id="homestay_id" name="homestay_id" required>
                    <option value="0">Select Options Homestay</option>
                    @foreach($homestays as $homestay)
                    <option value="{{ $homestay->id }}"
                        {{ $homestay->id == $availability->homestay_id ? 'selected' : '' }}>
                        {{ $homestay->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $availability->tanggal }}"
                    required>
            </div>

            <div class="form-group">
                <label for="tersedia">Status:</label>
                <select class="form-control" id="tersedia" name="tersedia" required>
                    <option value="0">Select Options Status</option>
                    <option value="Available" {{ $availability->tersedia == 'Available' ? 'selected' : '' }}>Available
                    </option>
                    <option value="Unavailable" {{ $availability->tersedia == 'Unavailable' ? 'selected' : '' }}>
                        Unavailable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection