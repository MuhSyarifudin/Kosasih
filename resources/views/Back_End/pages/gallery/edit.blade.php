@extends('Back_End.app')

@section('title', 'Edit Gallery')
@section('page', 'Edit Gallery')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Gallery List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Gallery</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <option value="{{ $homestay->id }}" @if($gallery->homestay_id == $homestay->id)
                                        selected @endif>{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Nama" value="{{ $gallery->nama }}" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="url" class="form-label">Image</label>
                                <input type="file" class="form-control @error('url') is-invalid @enderror" id="url"
                                    name="url" accept="image/*" required>
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('gallery.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection