@extends('Back_End.app')

@section('title', 'Add Tags')
@section('page', 'Add Tags')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Tags List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Tags</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id">Homestay</label>
                                <select class="form-control" id="homestay_id" name="homestay_id">
                                    {{-- Tampilkan daftar homestay --}}
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_lokasi">Nama Lokasi</label>
                                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                                @error('nama_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jarak">Jarak</label>
                                <input type="number" class="form-control" id="jarak" name="jarak" required>
                                @error('jarak')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">

                            </div>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('tag.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection