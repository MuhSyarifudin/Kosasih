@extends('Back_End.app')


@section('title', 'Tags List')
@section('page', 'Tags List')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Tags berada di sebelah kiri atas -->
        <a href="{{ route('tag.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Tags
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('tag.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Tags..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Tags -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Tags</th>
                <th>Nama Homestay</th>
                <th>Nama Lokasi</th>
                <th>Jarak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <!-- Isi tabel dengan data Tags Anda -->
            <tr class="text-center">
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->homestay_id }}</td>
                <td>{{ $tag->nama_lokasi }}</td>
                <td>{{ $tag->jarak }} / Km</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Tags ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Tags Anda -->
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $tags->appends(request()->input())->links('pagination::bootstrap-4') }}
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

/* CSS untuk merapikan tampilan tempat terdekat */
.form-group {
    margin-bottom: 20px;
}

.form-check {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.form-check-label {
    flex: 1;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

/* Ganti panjang kolom sesuai kebutuhan */
.col-md-3 {
    flex: 0 0 calc(33.3333% - 10px);
    /* Ganti sesuai kebutuhan */
    max-width: calc(33.3333% - 10px);
    /* Ganti sesuai kebutuhan */
    margin-right: 10px;
}
</style>
















@endsection