@extends('Back_End.app')

@section('title', 'Message Contact List')
@section('page', 'Message Contact List')
@section('content')

<div class="row">
    <!-- Tabel Contacts -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID Contact</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <!-- Isi tabel dengan data Contact Anda -->
            <tr class="text-center">
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->tamu->nama_tamu }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d F Y') }}
                </td>
                <td>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#liveChatModal{{ $contact->id }}">
                        Live Chat
                    </button>
                </td>
            </tr>

            <!-- Modal Live Chat -->
            <div class="modal fade" id="liveChatModal{{ $contact->id }}" tabindex="-1"
                aria-labelledby="liveChatModalLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="liveChatModalLabel{{ $contact->id }}">Live Chat -
                                {{ $contact->tamu->nama_tamu }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                        <img src="/images/staff/1.jpg" alt="{{ $contact->tamu->nama_tamu }}"
                                            class="avatar">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan baris lain sesuai dengan data Contact Anda -->
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $contacts->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
th {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Ganti panjang kolom sesuai kebutuhan */
.col-md-3 {
    flex: 0 0 calc(33.3333% - 10px);
    /* Ganti sesuai kebutuhan */
    max-width: calc(33.3333% - 10px);
    /* Ganti sesuai kebutuhan */
    margin-right: 10px;
}

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

@endsection
