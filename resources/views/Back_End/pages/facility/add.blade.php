@extends('Back_End.app')

@section('title', 'Add Facility')
@section('page', 'Add Facility')
@section('content')

<div class="col-md-12 mb-2 text-right">
    <a href="{{ route('facility.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Facility</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('facility.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gambar_fasilitas" class="form-label">Facility Image</label>
                                <input type="file" class="form-control" id="gambar_fasilitas" name="gambar_fasilitas">
                                @error('gambar_fasilitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Enter Jumlah" required>
                                @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_fasilitas" class="form-label">Facility Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" placeholder="Enter Facility Name" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id" name="homestay_id" required>
                                    <option value="" selected>Select Homestay</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }} <i class="bi bi-house"></i></option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('facility.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






</div>




@endsection