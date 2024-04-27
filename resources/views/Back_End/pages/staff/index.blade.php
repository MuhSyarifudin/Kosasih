@extends('Back_End.app')

@section('title', 'Staff List')
@section('page', 'Staff List')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Staff berada di sebelah kiri atas -->
        <a href="{{ route('staff.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Staff
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('staff.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Staff..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Staff -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Homestay</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $s)
            <!-- Isi tabel dengan data Staff Anda -->
            <tr class="text-center">
                <td>{{ $s->id }}</td>
                <td>
                    <div class="position-relative"
                        style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                        <img src="{{ $s->foto_staff }}" alt="Avatar" class="img-fluid position-absolute"
                            style="width: 100%; height: 100%;">
                    </div>
                </td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->jabatan }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->telepon }}</td>
                <td>{{ $s->homestay->nama }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('staff.edit', $s->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('staff.show', $s->id) }}" class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('staff.destroy', $s->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Staff ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Staff Anda -->
            @endforeach
        </tbody>
    </table>

    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $staff->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
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
