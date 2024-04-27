@extends('Back_End.app')

@section('title', 'Edit Homestay')
@section('page', 'Edit Homestay')
@section('content')


<div class="col-md-12 mb-2 text-right">
    <a href="{{ route('homestay.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Homestay</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('homestay.update', $homestay->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Homestay Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Homestay Name" value="{{ $homestay->nama }}"
                                    required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Homestay Image</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar" accept="image/*">
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img src="{{ asset('storage/homestay_images/' . $homestay->gambar) }}"
                                    alt="Homestay Image" class="img-fluid mt-2" style="max-height: 200px;">
                            </div>
                            <div class="mb-3">
                                <label for="harga_per_malam" class="form-label">Price Per Night</label>
                                <input type="number" class="form-control @error('harga_per_malam') is-invalid @enderror"
                                    id="harga_per_malam" name="harga_per_malam" value="{{ $homestay->harga_per_malam }}"
                                    required>
                                @error('harga_per_malam')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Address</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Enter Address"
                                    value="{{ $homestay->alamat }}" required>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kota">Kota</label>
                                <select class="form-control @error('kota') is-invalid @enderror" id="region_id"
                                    name="region_id" required>
                                    <option value="">Select City</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}"
                                        {{ $region->id == $homestay->region_id ? 'selected' : '' }}>{{ $region->kota }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="3" required>{{ $homestay->deskripsi }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('homestay.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection