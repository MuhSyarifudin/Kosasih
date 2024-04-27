@extends('Back_End.app')

@section('title', 'Daftar Region')
@section('page', 'Daftar Region')
@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        <a href="{{ route('region.create') }}" class="btn btn-secondary mb-3">
            <i class="bi bi-plus"></i> Tambah Region
        </a>
        <div class="col-md-3 float-right mb-3">
            <form action="{{ route('region.index') }}" method="GET">
                <input type="search" class="form-control" name="search" id="searchKota" placeholder="Cari Kota..."
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($regions as $index => $region)
                <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{ $region->kota }}</td>
                    <td>{{ $region->provinsi }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('region.edit', $region->id) }}"
                                class="btn btn-sm circular-button btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('region.destroy', $region->id) }}" method="POST"
                                onsubmit="return confirm('Anda yakin ingin menghapus Region ini ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm circular-button btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $regions->appends(request()->input())->links('pagination::bootstrap-4') }}

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

.zhidan.text-center {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Sesuaikan sesuai kebutuhan */
}
</style>
@endsection
