@extends('Back_End.app')

@section('title', 'Add Payment')
@section('page', 'Add Payment')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('payment.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Payment List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Payment</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pemesanan_id" class="form-label">Pemesanan ID</label>
                                <select class="form-control @error('pemesanan_id') is-invalid @enderror"
                                    id="pemesanan_id" name="pemesanan_id" required>
                                    <option value="">-- Select Pemesanan ID --</option>
                                    @foreach($pemesanans as $pemesanan)
                                    <option value="{{ $pemesanan->id }}">{{ $pemesanan->id }}</option>
                                    @endforeach
                                </select>
                                @error('pemesanan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Payment Date</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" required>
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tamu_id" class="form-label">Guest</label>
                                <select class="form-select" id="tamu_id" name="tamu_id" required>
                                    <option value="">Pilih Guest</option>
                                    @foreach($guests as $guest)
                                    <option value="{{ $guest->id }}">{{ $guest->nama_tamu }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <select class="form-control @error('status_pembayaran') is-invalid @enderror"
                                    id="status_pembayaran" name="status_pembayaran" required>
                                    <option value="">-- Select Payment Status --</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                </select>
                                @error('status_pembayaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <input type="number" class="form-control @error('total_harga') is-invalid @enderror"
                                    id="total_harga" name="total_harga" required>
                                @error('total_harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="layanan_tambahan_id" class="form-label">Layanan Tambahan</label>
                                <select class="form-select" id="layanan_tambahan_id" name="layanan_tambahan_id"
                                    required>
                                    <option value="">Pilih Layanan Tambahan</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Masukkan pilihan 'pemesanan_id' yang valid di sini -->
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('payment.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection