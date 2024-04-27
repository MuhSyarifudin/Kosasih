@extends('Back_End.app')

@section('title', 'Room')
@section('page', 'Room')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Room berada di sebelah kiri -->
        <a href="{{ route('room.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Room
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('room.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Room..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Room -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Room</th>
                <th>Gambar Room</th>
                <th>Homestay</th>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Harga Per Malam</th>
                <th>Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <!-- Isi tabel dengan data Room Anda -->
            <tr class="text-center">
                <td>{{ $room->id }}</td>
                <td>
                    <!-- Trigger modal -->
                    <button type="button" class="btn btn-dark fahrus p-0" data-toggle="modal"
                        data-target="#roomImageModal{{ $room->id }}">
                        View Gambar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="roomImageModal{{ $room->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="roomImageModalLabel{{ $room->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="roomImageModalLabel{{ $room->id }}">Gambar Room</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $room->mainImage->main_image) }}" class="img-fluid"
                                        alt="Gambar Room">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{ $room->homestay->nama }}</td>
                <td>{{ $room->nama }}</td>
                <td>{{ $room->kapasitas }} <i class="bi bi-person"></i></td>
                <td> $ {{ $room->harga_per_malam }}</td>
                <td class="truncate-text">{{ $room->fasilitas->nama_fasilitas }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('room.edit', $room->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('room.show', $room->id) }}" class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('room.destroy', $room->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Room ini ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Room Anda -->
            @endforeach
        </tbody>
    </table>



    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $rooms->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>





<style>
.fahrus {
    font-size: 11px;
}

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
    /* Untuk memberi jarak antara elemen-elemen */
}
</style>









@endsection
