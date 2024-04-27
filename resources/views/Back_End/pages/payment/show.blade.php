@extends('Back_End.app')

@section('title', 'Show Payment')
@section('page', 'Show Payment')
@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <a href="{{ route('payment.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Payments List
        </a>
    </div>

    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('path/to/payment-image.jpg') }}" alt="Payment Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $payment->id }}</h2>
                        <p><strong>Booking ID:</strong> {{ $payment->pemesanan_id }}</p>
                        <p><strong>Date:</strong> {{ $payment->tanggal }}</p>
                        <p><strong>Total Amount:</strong> ${{ $payment->total_harga }}</p>
                        <p><strong>Payment Status:</strong> {{ $payment->status_pembayaran }}</p>
                        <!-- Tampilkan informasi pembayaran di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection