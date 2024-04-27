@extends('Back_End.app')

@section('title', 'Add Review')
@section('page', 'Add Review')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('review.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Reviews List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Review</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('review.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">Homestay</label>
                                <select class="form-control @error('homestay_id') is-invalid @enderror" id="homestay_id"
                                    name="homestay_id" required>
                                    <option value="" disabled selected>Select Homestay</option>
                                    @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->id }}">{{ $homestay->nama }}</option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tamu_id" class="form-label">Tamu</label>
                                <select class="form-control @error('tamu_id') is-invalid @enderror" id="tamu_id"
                                    name="tamu_id" required>
                                    <option value="" disabled selected>Select Tamu</option>
                                    @foreach($tamus as $tamu)
                                    <option value="{{ $tamu->id }}">{{ $tamu->nama_tamu }}</option>
                                    @endforeach
                                </select>
                                @error('tamu_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select class="form-control @error('rating') is-invalid @enderror" id="rating"
                                    name="rating" required>
                                    <option value="" disabled selected>Select Rating</option>
                                    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ulasan" class="form-label">Ulasan</label>
                                <textarea class="form-control @error('ulasan') is-invalid @enderror" id="ulasan"
                                    name="ulasan" placeholder="Enter Ulasan" rows="4" required></textarea>
                                @error('ulasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('review.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
            </d iv>
        </div>
    </div>

    @endsection
