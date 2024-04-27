@extends('Back_End.app')

@section('title', 'Show Staff')
@section('page', 'Show Staff')
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
                <h4 class="card-title">Staff Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tambahkan tampilan sesuai dengan data staff, jika ada gambar bisa ditampilkan di sini -->
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $staff->nama }}</h2>
                        <p><strong>Jabatan:</strong> {{ $staff->jabatan }}</p>
                        <p><strong>Email:</strong> {{ $staff->email }}</p>
                        <p><strong>Telepon:</strong> {{ $staff->telepon }}</p>
                        <p><strong>Cabang ID:</strong> {{ $staff->cabang_id }}</p>
                        <!-- Tambahkan informasi lainnya yang relevan dengan staff Anda -->
                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection