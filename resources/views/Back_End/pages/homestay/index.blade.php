@extends('Back_End.app')

@section('title', 'Homestay')
@section('page', 'Homestay')
@section('content')


<div class="row">
    <div cl ass="col-md-12 mb-3">
        <!-- Tombol Homestay berada di sebelah kiri -->
        <a href="{{ route('homestay.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Homestay
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('homestay.index') }}" method="GET">
                <input type="search" class="form-control" name="search" id="searchFHomestay"
                    placeholder="Cari Homestay..." value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Homestay -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Nama Homestay</th>
                <th>Harga</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homestays as $homestay)
            <!-- Isi tabel dengan data Homestay Anda -->
            <tr class="text-center">
                <td>{{ $homestay->nama }}</td>
                <td>$ {{ $homestay->harga_per_malam }}</td>
                <td>{{ $homestay->alamat }}</td>
                <td class="truncate-text">{{ $homestay->region ? $homestay->region->kota : 'Region Tidak Tersedia' }}
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('homestay.edit', $homestay->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('homestay.show', $homestay->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('homestay.destroy', $homestay->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Homestay ini ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Homestay Anda -->
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">
        {{ $homestays->appends(request()->input())->links('pagination::bootstrap-4') }}

    </div>
</div>

<style>
.truncate-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100px;
    /* Sesuaikan dengan lebar maksimal yang diinginkan */
}

/* Style for pagination links */
.pagination {
    display: flex;
    justify-content: center;
}

.pagination .page-item {
    margin: 0 5px;
}

.pagination .page-link {
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination .page-link:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
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

.zhidan.text-center {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Sesuaikan sesuai kebutuhan */
}

/* CSS untuk mengatur card ke tengah */
.modal-dialog {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CSS tambahan jika Anda ingin mengatur lebar modal */
.modal-content {
    width: 100%;
    /* Ubah lebar sesuai kebutuhan Anda */
}

.col-md-6 li {
    margin-bottom: 2px;
    /* Atur margin bawah sesuai kebutuhan Anda */
}

/* Style for file input */
.file-input {
    display: none;
    /* Hide the actual file input */
}

/* Style for file label */
.file-label {
    display: block;
    font-size: 16px;
    color: #333;
}

/* Style for file label icon (optional) */
.file-label i {
    margin-right: 5px;
}
</style>








@endsection
