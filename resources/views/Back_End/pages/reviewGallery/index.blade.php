@extends('Back_End.app')

@section('title', 'Review Gallery')
@section('page', 'Review Gallery')
@section('content')

<div class="row">

    <div class="card-columns">
        @foreach($reviewGalleries as $rg)
        <div class="card">
            <img src="{{ asset('storage/' . $rg->image_path) }}" class="card-img-top" alt="{{ $rg->image_path }}">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('reviewGallery.edit', $rg->id) }}" class="btn btn-sm circular-button btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('reviewGallery.destroy', $rg->id) }}" method="POST"
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
        {{ $reviewGalleries->appends(request()->input())->links('pagination::bootstrap-4') }}
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
