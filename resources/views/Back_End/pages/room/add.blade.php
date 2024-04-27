@extends('Back_End.app')

@section('title', 'Add Room')
@section('page', 'Add Room')
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
                <h4 class="card-title">Add New Room</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Room Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Room Name" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kapasitas" class="form-label">Capacity</label>
                                <select class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas"
                                    name="kapasitas" required>
                                    <option value="" selected>Select Capacity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
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
                                    required>
                                @error('harga_per_malam')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    <option value="" selected>Select Homestay</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="main_image" class="form-label">Main Image</label>
                                <input type="file" class="form-control @error('main_image') is-invalid @enderror"
                                    id="main_image" name="main_image" accept="image/*">
                                @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fasilitas">Facility</label>
                                <select class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas"
                                    name="fasilitas" required>
                                    <option value="" selected>Select Facility</option>
                                    @foreach($fasilitas as $fasilitas)
                                    <option value="{{ $fasilitas->id }}">{{ $fasilitas->nama_fasilitas }}</option>
                                    @endforeach
                                </select>
                                @error('fasilitas')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="3" placeholder="Enter Description" required></textarea>
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





<style>
.image-upload-container {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.image-upload {
    position: relative;
    width: 100px;
    height: 100px;
    border: 2px dashed #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    cursor: pointer;
}

.upload-icon {
    font-size: 24px;
    color: #ccc;
}

.image-upload input {
    position: absolute;
    width: 100%;
    height:
        100%;
    opacity: 0;
    cursor:
        pointer;
}
</style>





@endsection