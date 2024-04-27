<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Invoice Guest</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Fonts Google  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    {{-- Boostrap 5 Icons --}}
    <!-- Tambahkan link FontAwesome di dalam tag <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- My Style | CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <style>
    body {
        background-color: #f8f9fa;
    }

    .invoice-container {
        max-width: 700px;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        overflow: hidden;
    }

    .invoice-header {
        text-align: center;
        padding: 20px 0;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .invoice-details {
        display: flex;
        justify-content: space-between;
        margin: 20px;
    }

    .profile-image img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info {
        max-width: 60%;
    }

    .profile-info p {
        margin: 10px 0;
        font-size: 16px;
    }

    .invoice {
        margin: 20px;
        text-align: left;
    }

    .invoice p {
        margin: 5px 0;
    }

    .invoice-items {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 0 0 10px 10px;
    }

    .item {
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
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

    .form-check {
        display: flex;
        align-items: center;
    }

    .form-check-label {
        margin-left: 10px;
        /* Adjust the value as needed */
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body class="bg-light">
    {{-- Header --}}
    @include('Front_End.partials.header')

    <div class="invoice-container">
        <div class="invoice-header custom-bg">
            <h4>Invoice {{ $pemesanan -> tamu->nama_tamu }}</h4>
        </div>

        <div class="invoice-details">
            <div class="profile-image">
                <!-- Include homestay image here -->
                <!-- <img src="homestay_image.jpg" alt="Homestay Image" class="img-fluid"> -->
            </div>
            <div class="profile-info">
                <!-- Include homestay details here -->
                <p>Homestay: {{ $pemesanan->homestay->nama }}</p>
                <p>Loc: {{ $pemesanan->homestay->alamat }}</p>
                <p>Check-in: {{ \Carbon\Carbon::parse( $pemesanan->tanggal_checkin)->format('j F Y ') }}</p>
                <p>Check-out: {{ \Carbon\Carbon::parse( $pemesanan->tanggal_checkout)->format('j F Y ') }}</p>
            </div>
        </div>

        <div class="invoice">
            <p><strong>Invoice Number:</strong> {{ $pemesanan->id }}</p>
            <p><strong>Invoice Date:</strong>
                {{ \Carbon\Carbon::parse($pemesanan->created_at)->format('j F Y ') }}
            </p>
        </div>

        <div class="invoice-items">
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


        <div class="text-center mb-2">
            <a href="{{ route('generate.invoice', ['id' => $pemesanan->id]) }}"
                class="btn custom-bg shadow-none text-white mr-3">Generate Invoice</a>
            <button type="button" class="btn custom-bg shadow-none text-white" data-bs-toggle="modal"
                data-bs-target="#payNowModal ">
                Pay Now
            </button>
            <!-- Pay Now Modal -->
            <div class="modal fade" id="payNowModal" tabindex="-1" aria-labelledby="payNowModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header custom-bg text-white">
                            <h5 class="modal-title" id="payNowModalLabel">Payment Details</h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="bankAccount" class="form-label">Bank Account Number</label>
                                <form id="updatePaymentForm"
                                    action="{{ route('tamu.payment', ['id' => $pemesanan->id]) }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="inputName" class="form-label">Bank Name</label>
                                        <input class="form-control text-center" value="BNI" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputNumber" class="form-label">Account Number</label>
                                        <input class="form-control text-center" value="19027245797" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputHolder" class="form-label">Account Holder:</label>
                                        <input class="form-control text-center" value="OwnerHomestay" readonly>
                                    </div>
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck"
                                                name="payment_confirmed" onchange="updatePaymentStatus()">
                                            <label class="form-check-label small" for="gridCheck">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span id="paymentStatus" class="text-muted small">(Payment status:
                                            {{ $pemesanan->invoice->status_pembayaran ?? 'Pending' }})</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer  --}}
    @include('Front_End.partials.footer')

    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            640: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 3
            },
            1024: {
                slidesPerView: 3
            },
        },
    });
    </script>

    <script>
    function updatePaymentStatus() {
        var form = document.getElementById('updatePaymentForm');
        var paymentStatus = document.getElementById('paymentStatus');

        // Submit the form when the checkbox changes
        form.submit();
    }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>





</html>