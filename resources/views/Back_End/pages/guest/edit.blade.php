@extends('Back_End.app')

@section('title', 'Edit Guest')
@section('page', 'Edit Guest')
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
                <h4 class="card-title">Edit Guest</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guest.update', $guest->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="foto_tamu" class="form-label">Foto Tamu (Avatar)</label>
                                <input type="file" class="form-control @error('foto_tamu') is-invalid @enderror"
                                    id="foto_tamu" name="foto_tamu" accept="image/*">
                                @error('foto_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($guest->foto_tamu)
                                <img src="{{ asset('storage/' . $guest->foto_tamu) }}" alt="Guest Avatar"
                                    class="img-fluid rounded-circle mt-2" style="max-width: 150px;">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="nama_tamu" class="form-label">Guest Name</label>
                                <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror"
                                    id="nama_tamu" name="nama_tamu" value="{{ old('nama_tamu', $guest->nama_tamu) }}"
                                    required>
                                @error('nama_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email_tamu" class="form-label">Guest Email</label>
                                <input type="email" class="form-control @error('email_tamu') is-invalid @enderror"
                                    id="email_tamu" name="email_tamu"
                                    value="{{ old('email_tamu', $guest->email_tamu) }}" required>
                                @error('email_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_tamu" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control @error('password_tamu') is-invalid @enderror"
                                        id="password_tamu" name="password_tamu" pattern=".{6,}"
                                        title="Six or more characters">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file_tamu" class="form-label">Guest File</label>
                                <input type="file" class="form-control @error('file_tamu') is-invalid @enderror"
                                    id="file_tamu" name="file_tamu" accept="image/*">
                                @error('file_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('guest.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Update</button>
           
         </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection