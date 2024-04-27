@extends('Back_End.app')

@section('title', 'Contacts')
@section('page', 'Contacts')
@section('content')


<div class="row">
    @foreach($contacts as $contact)
    <div class="col-md-3">
        <div class="card position-relative mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <small class="text-muted">Send at<i class="bi bi-clock ml-1"></i>
                        :{{ $contact->created_at->diffForHumans() }}</small>
                </div>
                <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
                <p class="card-text"><strong>Subject:</strong> {{ $contact->subject }}</p>
                <p class="card-text"><strong>Message:</strong> {{ $contact->message }}</p>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger circular-button">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
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
</style>








@endsection
