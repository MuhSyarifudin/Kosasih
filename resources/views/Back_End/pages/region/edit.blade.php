@extends('Back_End.app')

@section('title', 'Edit Region')
@section('page', 'Edit Region')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('region.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Region List
        </a>
    </div>

    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Region</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('region.update', $region->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                                    name="kota" value="{{ $region->kota }}" required>
                                @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                    id="provinsi" name="provinsi" value="{{ $region->provinsi }}" required>
                                @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">Update Region</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection