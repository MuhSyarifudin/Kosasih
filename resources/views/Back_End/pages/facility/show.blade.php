@extends('Back_End.app')

@section('title', 'Show Facility')
@section('page', 'Show Facility')
@section('content')

<div class="col-md-12 mb-2 text-right">
    <a href="{{ route('facility.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Facility Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2><strong>Icon:</strong>{{ $facility->icon }}</h2>
                        <h2 class="mb-3">{{ $facility->nama }}</h2>
                        <p><strong>Homestay ID:</strong> {{ $facility->homestay->nama }}</p>
                        <p><strong>Description:</strong>{{ $facility->deskripsi }}</p>
                        <p><strong>Jumlah:</strong>{{ $facility->jumlah }}</p>
                        <a href="{{ route('facility.edit', $facility->id) }}"
                            class="btn btn-sm circular-button btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection