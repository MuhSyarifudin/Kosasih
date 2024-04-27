@extends('Back_End.app')

@section('title', 'Add Staff')
@section('page', 'Add Staff')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Staff List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Staff</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Staff</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" placeholder="Enter Nama" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" placeholder="Enter Jabatan" required>
                                @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Enter Email" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                    id="telepon" name="telepon" placeholder="Enter Telepon" required>
                                @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    <option value="">-- Select Homestay --</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Additional fields related to staff can be added here -->
                    </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('staff.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>
</div>

@endsection