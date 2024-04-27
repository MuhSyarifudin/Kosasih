@extends('Back_End.app')

@section('title', 'Tambah Region')
@section('page', 'Tambah Region')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('region.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to region List
        </a>
    </div>

    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Region</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('region.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                                    name="kota" required>
                                @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                    id="provinsi" name="provinsi" required>
                                @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">Tambah Region</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection