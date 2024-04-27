@extends('Back_End.app')

@section('title', 'Facilities')
@section('page', 'Facilities')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Facilities berada di sebelah kiri -->
        <a href="{{ route('facility.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Facility
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('facility.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Facility..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Facilities -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Facility</th>
                <th>Image</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Homestay ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fasilitas as $facility)
            <!-- Isi tabel dengan data Facility Anda -->
            <tr class="text-center">
                <td>{{ $facility->id }}</td>
                <td><img src="{{ asset('storage/' . $facility->gambar_fasilitas) }}" alt="Facility Image"
                        style="max-width: 50px; max-height: 50px;"></td>
                <td>{{ $facility->nama_fasilitas }}</td>
                <td class="truncate-text">{{ $facility->deskripsi }}</td>
                <td>{{ $facility->homestay->nama }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('facility.edit', $facility->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('facility.show', $facility->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('facility.destroy', $facility->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Facility ini ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Facility Anda -->
            @endforeach
        </tbody>
    </table>
    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $fasilitas->appends(request()->input())->links('pagination::bootstrap-4') }}
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
    /* Untu

k memberi j
arak antara elemen-elemen */
}
</style>


@endsection
