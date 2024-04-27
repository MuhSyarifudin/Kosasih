@extends('Back_End.app')

@section('title', 'Add Room Gallery')
@section('page', 'Add Room Gallery')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('roomGallery.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    <div class="col-md-12">
        <form action="{{ route('roomGallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="main_image">Image Path</label>
                <input type="file" class="form-control" id="main_image" name="main_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection