@extends('Back_End.app')

@section('title', 'Service List')
@section('page', 'Service List')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Service berada di sebelah kiri atas -->
        <a href="{{ route('service.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Service
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('service.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Service..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Service -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Service</th>
                <th>Homestay</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <!-- Isi tabel dengan data Service Anda -->
            <tr class="text-center">
                <td>{{ $service->id }}</td>
                <td>{{ $service->homestay->nama }}</td>
                <td>{{ $service->nama }}</td>
                <td>$ {{ $service->harga }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('service.edit', $service->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('service.show', $service->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Service ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Service Anda -->
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $services->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
.truncate-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
    /* Sesuaikan dengan lebar maksimal yang diinginkan */
}

.position-relative {
    position: relative;
    overflow: hidden;
}

.position-relative img {
    transition: transform 0.3s ease;
}

.position-relative:hover img {
    transform: scale(1.1);
}

.position-absolute {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.position-relative:hover .position-absolute {
    opacity: 1;
}

.circular-button {
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin: 5px;
    display: flex;
    align-items: center;
    justify-content: center;

}
</style>








@endsection