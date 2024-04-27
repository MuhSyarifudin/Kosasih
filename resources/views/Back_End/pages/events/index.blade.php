@extends('Back_End.app')

@section('title', 'Event')
@section('page', 'Event')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Event berada di sebelah kiri atas -->
        <a href="{{ route('event.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Event
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('event.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Event..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Event -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Event</th>
                <th>Homestay</th>
                <th>Nama Event</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Pamflet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <!-- Isi tabel dengan data Event Anda -->
            <tr class="text-center">
                <td>{{ $event->id }}</td>
                <td>{{ $event->homestay->nama }}</td>
                <td>{{ $event->nama_event }}</td>
                <td>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d F Y') }}</td>
                <td>
                    <!-- Trigger modal -->
                    <button type="button" class="btn btn-dark fahrus" data-toggle="modal"
                        data-target="#eventImageModal{{ $event->id }}">
                        View Pamflet
                    </button>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('event.show', $event->id) }}" class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this Event item?');">
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
            <div class="modal fade" id="eventImageModal{{ $event->id }}" tabindex="-1" role="dialog"
                aria-labelledby="eventImageModalLabel{{ $event->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventImageModalLabel{{ $event->id }}">Pamflet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $event->gambar_event) }}" class="img-fluid" alt="Pamflet">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan baris lain sesuai dengan data Event Anda -->
            @endforeach
        </tbody>
    </table>
    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $events->appends(request()->input())->links('pagination::bootstrap-4') }}
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

/* Style for modal buttons */
.fahrus {
    font-size: 10px;
    /* Adjust the font size as needed */
}
</style>


















@endsection
