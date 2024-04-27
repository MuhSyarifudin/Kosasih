@extends('Back_End.app')

@section('title', 'Reviews List')
@section('page', 'Reviews List')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Review berada di sebelah kiri atas -->
        <a href="{{ route('review.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Review
        </a>
        <!-- Input pencarian berada di sebelah kanan atas -->
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('review.index') }}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Cari Review..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <!-- Tabel Reviews -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Review</th>
                <th>Homestay ID</th>
                <th>Tamu ID</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Image Review</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <!-- Isi tabel dengan data Reviews Anda -->
            <tr class="text-center">
                <td>{{ $review->id }}</td>
                <td>{{ $review->homestay->nama }}</td>
                <td>{{ $review->tamu->nama_tamu }}</td>
                <td>{{ $review->rating }}</td>
                <td class="truncate-text">{{ $review->ulasan }}</td>
                <td>
                    <!-- Trigger modal -->
                    <button type="button" class="btn btn-dark" data-toggle="modal"
                        data-target="#reviewImageModal{{ $review->id }}">
                        View Image
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="reviewImageModal{{ $review->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="reviewImageModalLabel{{ $review->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reviewImageModalLabel{{ $review->id }}">Image Review
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if($review->gallery)
                                    <img src="{{ asset('storage/' . $review->gallery->image_path) }}"
                                        class="img-thumbnail" alt="Review Image">
                                    @else
                                    No Image
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('review.edit', $review->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('review.show', $review->id) }}"
                            class="btn btn-sm circular-button btn-success">
                            <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('review.destroy', $review->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus Review ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm circular-button btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai dengan data Reviews Anda -->
            @endforeach
        </tbody>
    </table>
    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $reviews->appends(request()->input())->links('pagination::bootstrap-4') }}
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
</style>
















@endsection