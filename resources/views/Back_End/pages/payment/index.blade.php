@extends('Back_End.app')

@section('title', 'Payments Gateway')
@section('page', 'Payments Gateway')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Pembayaran berada di sebelah kiri atas -->
        <a href="{{ route('payment.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Pembayaran
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('payment.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Pembayaran..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Payments -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Pembayaran</th>
                <th>ID Pemesanan</th>
                <th>Guest</th>
                <th>Tanggal</th>
                <th>Layanan Tambahan</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <!-- Isi tabel dengan data Payments Anda -->
            <tr class="text-center">
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->pemesanan_id }}</td>
                <td>{{ $payment->tamu->nama_tamu }}</td>
                <td>{{ \Carbon\Carbon::parse($payment->tanggal)->format('d F Y') }}</td>
                <td>{{ $payment->service->nama }}</td>
                <td>${{ $payment->total_harga }}</td>
                <td>{{ $payment->status_pembayaran }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('payment.edit', $payment->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('payment.show', $payment->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('payment.destroy', $payment->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Pembayaran ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Payments Anda -->
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $payments->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>



<style>
.circular-button {
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.zhidan {
    display: inline-block;
    width: 100%;
    /* Sesuaikan lebar sesuai kebutuhan */
    text-align: center;
    /* Untuk membuat teks menjadi sejajar di tengah */
    margin-right: 10px;
    /* Untuk memberi jarak antara elemen-elemen */
}
</style>




@endsection
