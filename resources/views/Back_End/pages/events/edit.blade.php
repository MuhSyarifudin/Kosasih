@extends('Back_End.app')

@section('title', 'Edit Event')
@section('page', 'Edit Event')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('event.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Event List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Event</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <option value="{{ $homestay->id }}" @if($event->homestay_id == $homestay->id)
                                        selected @endif>{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Event</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama_event" name="nama_event" placeholder="Enter Nama"
                                    value="{{ $event->nama_event }}" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    id="tanggal_mulai" name="tanggal_mulai" value="{{ $event->tanggal_mulai }}"
                                    required>
                                @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                    id="tanggal_selesai" name="tanggal_selesai" value="{{ $event->tanggal_selesai }}"
                                    required>
                                @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar_event" class="form-label">Pamflet</label>
                                <input type="file" class="form-control @error('gambar_event') is-invalid @enderror"
                                    id="gambar_event" name="gambar_event" accept="image/*">
                                @error('gambar_event')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="4" required>{{ $event->deskripsi }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('event.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
