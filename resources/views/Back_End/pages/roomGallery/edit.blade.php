@extends('Back_End.app')

@section('title', 'Edit Room Gallery')
@section('page', 'Edit Room Gallery')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>Edit Room Gallery</h2>
        <form action="{{ route('roomGallery.update', $roomGallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="main_image">Image Path</label>
                <input type="file" class="form-control" id="main_image" name="main_image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection