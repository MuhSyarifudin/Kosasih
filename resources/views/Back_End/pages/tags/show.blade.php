@extends('Back_End.app')

@section('title', 'Show Tags')
@section('page', 'Show Tags')
@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Tags List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tags Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $tag->nama_lokasi }}</h2>
                        <p class="mb-3">Jarak: {{ $tag->jarak }} km</p>
                        <p class="mb-3">Homestay: {{ $tag->homestay_id }}</p>
                        <!-- Tambahkan informasi lainnya yang relevan dengan Tags Anda -->
                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
