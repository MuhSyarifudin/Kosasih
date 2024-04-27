@extends('Back_End.app')

@section('title', ' Availability Homestay')
@section('page', 'Availability Homestay')
@section('content')


<div class="row">
    <div cl ass="col-md-12 mb-3">
        <!-- Tombol Homestay berada di sebelah kiri -->
        <a href="{{ route('availability-homestay.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Homestay
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="" method="GET">
                <input type="search" class="form-control" name="search" id="searchFHomestay" placeholder="Cari Homestay..." value="">
            </form>
        </div>
    </div>
    <!-- Tabel Homestay -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Homestay</th>
                <th>Nama Room</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilitys as $availability)
            <!-- Isi tabel dengan data Homestay Anda -->
            <tr class="text-center">
                <td>{{ $availability->id }}</td>
                <td>{{ $availability->homestay->nama }}</td>
                <td>{{ $availability->rooms->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($availability->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                <td>{{ $availability->tersedia }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('availability-homestay.edit', $availability->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('availability-homestay.destroy', $availability->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus Homestay ini ?');">
                            <!-- @csrf
                            @method('DELETE') -->
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            <!-- Tambahkan baris lain sesuai dengan data Homestay Anda -->

        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">


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