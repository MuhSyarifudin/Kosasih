<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Payment Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .receipt-container {
        max-width: 600px;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        overflow: hidden;
    }

    .receipt-header {
        text-align: center;
        padding: 20px 0;
        background-color: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .receipt-details {
        display: flex;
        justify-content: space-between;
        margin: 20px;
    }

    .receipt-info {
        max-width: 40%;
        /* Adjusted width */
        text-align: right;
        /* Align to the right */
    }

    .receipt-info p {
        margin: 10px 0;
        font-size: 16px;
        color: #333;
    }

    .profile-image {
        max-width: 60%;
        /* Adjusted width */
    }

    .payment-details {
        margin: 20px;
        text-align: left;
    }

    .payment-details p {
        margin: 5px 0;
        color: #333;
    }

    .receipt-items {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 0 0 10px 10px;
    }

    .item {
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        color: #555;
    }

    .item:last-child {
        border-bottom: none;
    }

    .total {
        font-weight: bold;
    }

    .btn-primary {
        margin-top: 20px;
    }

    /* ... (other CSS styles) ... */
    </style>
</head>

<body class="bg-light">
    <!-- Receipt Container -->
    <div class="receipt-container">
        <!-- Receipt Header -->
        <div class="receipt-header">
            <h4>Payment Receipt</h4>
        </div>

        <!-- Receipt Details -->
        <div class="receipt-details">
            <div class="receipt-info">
                <p>Customer: {{ $pemesanan->tamu->nama_tamu }}</p>
                <p>Homestay: {{ $pemesanan->homestay->nama }}</p>
                <p>Location: {{ $pemesanan->homestay->alamat }}</p>
                <p>Check In: {{ \Carbon\Carbon::parse($pemesanan->tanggal_checkin)->format('j F Y ') }}</p>
                <p>Check Out: {{ \Carbon\Carbon::parse($pemesanan->tanggal_checkout)->format('j F Y ') }}</p>
            </div>
            <div class="profile-image">
                <!-- Include homestay image here -->
                <!-- <img src="homestay_image.jpg" alt="Homestay Image" class="img-fluid"> -->
            </div>
        </div>

        <!-- Payment Details -->
        <div class="payment-details">
            <p><strong>Invoice Number:</strong> {{ $pemesanan->id }}</p>
            <p><strong>Invoice Date:</strong> {{ \Carbon\Carbon::parse($pemesanan->created_at)->format('j F Y ') }}
            </p>
        </div>

        <!-- Receipt Items -->
        <div class="receipt-items">
            <div class="item">
                <span>Room Fee (1 night)</span>
                <span>${{ $pemesanan->room->harga_per_malam }}</span>
            </div>
            <!-- Calculate and display total nights -->
            @php
            $checkinDate = \Carbon\Carbon::parse($pemesanan->tanggal_checkin);
            $checkoutDate = \Carbon\Carbon::parse($pemesanan->tanggal_checkout);
            $totalNights = $checkoutDate->diffInDays($checkinDate);
            @endphp
            <!-- Add more items as needed -->
            <div class="item">
                <span>Total Nights</span>
                <span>{{ $totalNights }}</span>
            </div>
            <div class="item">
                <span>Total</span>
                <span class="total">$ {{ $pemesanan->total_harga }}</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>