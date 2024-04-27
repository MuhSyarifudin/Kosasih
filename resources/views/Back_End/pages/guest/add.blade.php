@extends('Back_End.app')

@section('title', 'Add Guest')
@section('page', 'Add Guest')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('guest.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Guest List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Guest</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="foto_tamu" class="form-label">Foto Tamu (Avatar)</label>
                                <input type="file" class="form-control @error('foto_tamu') is-invalid @enderror"
                                    id="foto_tamu" name="foto_tamu" accept="image/*" required>
                                @error('foto_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_tamu" class="form-label">Guest Name</label>
                                <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror"
                                    id="nama_tamu" name="nama_tamu" placeholder="Enter Guest Name" required>
                                @error('nama_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email_tamu" class="form-label">Guest Email</label>
                                <input type="email" class="form-control @error('email_tamu') is-invalid @enderror"
                                    id="email_tamu" name="email_tamu" placeholder="Enter Guest Email" required>
                                @error('email_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file_tamu" class="form-label">Guest File</label>
                                <input type="file" class="form-control @error('file_tamu') is-invalid @enderror"
                                    id="file_tamu" name="file_tamu" accept="image/*" required>
                                @error('file_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password_tamu" name="password_tamu" pattern=".{6,}"
                                        title="Six or more characters" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('guest.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>





@endsection