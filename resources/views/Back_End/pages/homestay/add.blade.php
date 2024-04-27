@extends('Back_End.app')

@section('title', 'Add Homestay')
@section('page', 'Add Homestay')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('homestay.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Homestay List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Homestay</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('homestay.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Homestay Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Homestay Name" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Homestay Image</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar" accept="image/*" required>
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_per_malam" class="form-label">Price Per Night</label>
                                <input type="number" class="form-control @error('harga_per_malam') is-invalid @enderror"
                                    id="harga_per_malam" name="harga_per_malam" required>
                                @error('harga_per_malam')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kota">Kota</label>
                                <select class="form-control @error('kota') is-invalid @enderror" id="region_id"
                                    name="region_id" required>
                                    <option value="">Select City</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->kota }}</option>
                                    @endforeach
                                </select>
                                @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Address</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Enter Address" required>
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="3" required></textarea>
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
