@extends('Back_End.app')

@section('title', 'Gallery')
@section('page', 'Gallery')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Gallery berada di sebelah kiri atas -->
        <a href="{{ route('gallery.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Gallery
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('gallery.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Gallery..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Gallery -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Gallery</th>
                <th>Homestay</th>
                <th>Nama</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)
            <!-- Isi tabel dengan data Gallery Anda -->
            <tr class="text-center">
                <td>{{ $gallery->id }}</td>
                <td>{{ $gallery->homestay->nama }}</td>
                <td>{{ $gallery->nama }}</td>
                <td> <button type="button" class="btn btn-sm btn-dark text-white" data-toggle="modal"
                        data-target="#galleryModal{{ $gallery->id }}">
                        View Image
                    </button>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('gallery.edit', $gallery->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('gallery.show', $gallery->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this Gallery item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="galleryModal{{ $gallery->id }}" tabindex="-1" role="dialog"
                aria-labelledby="galleryModalLabel{{ $gallery->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="galleryModalLabel{{ $gallery->id }}">Gallery Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $gallery->url) }}" class="img-fluid"
                                alt="{{ $gallery->nama }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <!-- Tambahkan baris lain sesuai dengan data Gallery Anda -->
            @endforeach
        </tbody>
    </table>

    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $galleries->appends(request()->input())->links('pagination::bootstrap-4') }}
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

}

th {

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>







@endsection