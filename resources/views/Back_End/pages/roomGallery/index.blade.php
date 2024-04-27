@extends('Back_End.app')

@section('title', 'Room Gallery')
@section('page', 'Room Gallery')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Tombol Tambah Gallery berada di sebelah kiri atas -->
        <a href="{{ route('roomGallery.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus"></i> Tambah Gallery
        </a>
    </div>

    <div class="card-columns">
        @foreach($roomGalleries as $g)
        <div class="card">
            <img src="{{ asset('storage/' . $g->main_image) }}" class="card-img-top" alt="{{ $g->main_image }}">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('roomGallery.edit', $g->id) }}" class="btn btn-sm circular-button btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('roomGallery.show', $g->id) }}" class="btn btn-sm circular-button btn-success">
                        <i class="bi bi-eye"></i>
                    </a>
                    <form action="{{ route('roomGallery.destroy', $g->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this Gallery item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm circular-button btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tampilkan Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        {{ $roomGalleries->appends(request()->input())->links('pagination::bootstrap-4') }}
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

.card-columns {
    column-count: 3;
    /* Sesuaikan jumlah kolom sesuai kebutuhan */
    gap: 20px;
    /* Sesuaikan jarak antar kartu sesuai kebutuhan */
}

.card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
}
</style>

@endsection
