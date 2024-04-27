@extends('Back_End.app')

@section('title', 'Logs')
@section('page', 'Logs')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Log Information</h5>
                <p class="card-text">No logs available.</p>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    margin: 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
}

.card-text {
    font-size: 1.2rem;
    color: #6c757d;
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>


@endsection