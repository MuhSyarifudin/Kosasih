@extends('Back_End.app')

@section('title', 'Edit Review Gallery')
@section('page', 'Edit Review Gallery')
@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('reviewGallery.update', $rg->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image_path">Image Path</label>
                <input type="file" class="form-control" id="image_path" name="image_path">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection