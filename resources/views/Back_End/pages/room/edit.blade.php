@extends('Back_End.app')

@section('title', 'Edit Room')
@section('page', 'Edit Room')
@section('content')


<div class="col-md-12 mb-2 text-right">
    <a href="{{ route('room.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Room</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('room.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Room Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Room Name" value="{{ $room->nama }}" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="main_image" class="form-label">Main Image</label>
                                <input type="file" class="form-control @error('main_image') is-invalid @enderror"
                                    id="main_image" name="main_image" accept="image/*">
                                @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kapasitas" class="form-label">Capacity</label>
                                <select class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas"
                                    name="kapasitas" required>
                                    <option value="1" {{ $room->kapasitas == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $room->kapasitas == 2 ? 'selected' : '' }}>2</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('kapasitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_per_malam" class="form-label">Price Per Night</label>
                                <input type="number" class="form-control @error('harga_per_malam') is-invalid @enderror"
                                    id="harga_per_malam" name="harga_per_malam" placeholder="Enter Price Per Night"
                                    value="{{ $room->harga_per_malam }}" required>
                                @error('harga_per_malam')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}"
                                        {{ $room->homestay_id == $homestay->id ? 'selected' : '' }}>
                                        {{ $homestay->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fasilitas">Facility</label>
                                <select class="form-control @error('fasilitas_id') is-invalid @enderror"
                                    name="fasilitas_id" required>
                                    @foreach($fasilitas as $fasilitas)
                                    <option value="{{ $fasilitas->id }}"
                                        {{ $room->fasilitas_id == $fasilitas->id ? 'selected' : '' }}>
                                        {{ $fasilitas->nama_fasilitas }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('fasilitas_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="3" placeholder="Enter Description"
                                    required>{{ $room->deskripsi }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                        <a href="{{ route('room.index') }}" class="btn btn-secondary mr-2">Cancel</a>


                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection