@extends('Back_End.app')


@section('title', 'Guest')
@section('page', 'Guest')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Guest berada di sebelah kiri -->
        <a href="{{ route('guest.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Guest
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('guest.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Guest..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Guest -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Guest</th>
                <th>Avatar</th>
                <th>Nama</th>
                <th>Email</th>
                <th>File Tamu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
            <!-- Isi tabel dengan data Guest Anda -->
            <tr class="text-center">
                <td>{{ $guest->id }}</td>
                <td> @if($guest->foto_tamu)
                    <img src="{{ asset('storage/' . $guest->foto_tamu) }}" alt="Guest Photo"
                        class="img-fluid rounded-circle">
                    @else
                    <img src="{{ asset('path-to-placeholder-avatar.jpg') }}" alt="Placeholder Avatar"
                        class="img-fluid rounded-circle">
                    @endif
                </td>
                <td>{{ $guest->nama_tamu }}</td>
                <td>{{ $guest->email_tamu }}</td>
                <td> <button type="button" class="btn btn-sm btn-dark text-white" data-toggle="modal"
                        data-target="#viewFileModal{{ $guest->id }}">
                        View File
                    </button></td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('guest.edit', $guest->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('guest.show', $guest->id) }}" class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('guest.destroy', $guest->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Guest ini ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Modal for Viewing and Downloading File -->
            <div class="modal fade" id="viewFileModal{{ $guest->id }}" tabindex="-1" role="dialog"
                aria-labelledby="viewFileModalLabel{{ $guest->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewFileModalLabel{{ $guest->id }}">View and Download Guest File
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            @if (Str::endsWith($guest->file_tamu, ['.jpg', '.jpeg', '.png', '.gif']))
                            <!-- Display image -->
                            <img src="{{ asset('storage/' . $guest->file_tamu) }}" alt="Guest Image" class="img-fluid">
                            @else
                            <!-- Display a placeholder or provide a download link for non-image files -->
                            <p>Preview not available. <a href="{{ asset('storage/' . $guest->file_tamu) }}"
                                    download>Download
                                    File</a></p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Modal for Viewing and Downloading File -->

            <!-- Tambahkan baris lain sesuai dengan data Guest Anda -->
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $guests->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
/* Tambahkan pada bagian CSS Anda */
.img-fluid.rounded-circle {
    max-width: 40px;
    max-height: 40px;
    /* Sesuaikan dengan ukuran yang diinginkan */
    height: auto;
}

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
    /* Untuk memberi jarak antara elemen-elemen */
}
</style>














@endsection