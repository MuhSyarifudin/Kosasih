<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generalSettings->site_title }} | Chat Guest</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- My Style | CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .chat-header {
        background-color: teal;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
    }

    .message {
        background-color: #e0e0e0;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .chat-input {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-top: 1px solid #ccc;
    }

    .input-box {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .file-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 8px 12px;
        background-color: teal;
        color: #fff;
        border-radius: 5px;
    }

    .file-icon {
        margin-right: 5px;
    }

    .file-input {
        display: none;

    }

    .send-btn {
        background-color: teal;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 5px;
    }

    .chat-messages {
        overflow-y: auto;
        max-height: 300px;
        /* Adjust as needed */
        padding: 10px;
    }

    .message {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .message-content {
        background-color: #e0e0e0;
        padding: 10px;
        border-radius: 8px;
        max-width: 70%;
    }

    .message.admin .message-content {
        background-color: teal;
        color: #fff;
    }

    .message.user .message-content {
        background-color: teal;
        color: white;
        margin-right: 8px;
        margin-left: 85px;
        padding: 10px;
        border-radius: 8px;
        max-width: calc(100% - 60px);
        /* Adjust the value as needed */
    }

    .message.user .avatar {
        margin-left: 5px;
        /* Adjust the value as needed */
    }

    .mini-navbar {
        background-color: #f8f9fa;
        padding: 5px;
        text-align: center;
        font-weight: bold;
    }

    .contact-name {
        color: teal;
    }


    .timestamp {
        font-size: 10px;
        color: white;
        margin-top: 5px;
        display: block;
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body class="bg-light">
    {{-- Header --}}
    @include('Front_End.partials.header')
    <!-- Chat Interface -->
    <div class="chat-container mt-3">
        <div class="chat-header">
            <i class="bi bi-chat-dots"></i> Chat Room
        </div>
        <!-- Mini Navbar -->
        <div class="mini-navbar">
            <span class="contact-name">Admin</span>
            <!-- You can add more information or buttons here if needed -->
        </div>
        <div class="chat-messages">
            <!-- User Message -->
            @foreach($contacts->reverse() as $contact)
            <div class="message user">
                <div class="message-content">
                    <p>{{  $contact->message  }}</p>
                    <span class="timestamp">{{ $contact->created_at->diffForHumans() }}</span>
                </div>
                <img src="/images/staff/1.jpg" alt="{{ $contact->tamu->nama_tamu }}" class="avatar">
            </div>
            @endforeach

            <!-- Admin Message -->
            <div class="message admin">
                <img src="/images/staff/3.jpg" alt="Admin Avatar" class="avatar">
                <div class="message-content">
                    <p>Sure, I'm here to help. What would you like to know?</p>
                    <span class="timestamp">Just now</span>
                </div>
            </div>

            <!-- Add more messages as needed -->
        </div>
        <div class="chat-input">
            <input type="text" class="input-box" placeholder="Type your message...">
            <label class="file-label">
                <span class="file-icon"><i class="bi bi-file-earmark-plus"></i></span>
                <input type="file" class="file-input" accept="image/*,video/*">
            </label>
            <div class="file-preview" id="filePreview"></div>
            <button class="send-btn">Send</button>
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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>








</html>
