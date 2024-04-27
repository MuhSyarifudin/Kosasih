    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Isi konten modal register di sini -->
                <div class="modal-header bg-custom">
                    <h5 class="modal-title text-white" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form register atau konten modal lainnya -->
                <div class="modal-body">
                    <form action="{{ route('tamu.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="nama_tamu" class="form-label">Nama Tamu</label>
                                <input type="text" class="form-control" id="nama_tamu" name="nama_tamu"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email_tamu" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email_tamu" name="email_tamu"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="password_tamu" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password_tamu" name="password_tamu"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="foto_tamu" class="form-label">Profile Tamu</label>
                                <input type="file" class="form-control" id="foto_tamu" name="foto_tamu" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file_tamu" class="form-label">Berkas Tamu</label>
                                <input type="file" class="form-control" id="file_tamu" name="file_tamu" required>
                                <small class="form-text text-muted">Please upload a document E-KTP or ID Card .</small>
                            </div>
                        </div>
                        <div class="center-btn-container">
                            <button type="submit" class="btn bg-custom text-white">Register</button>
                        </div>
                    </form>

                    <!-- Link untuk pindah ke bagian login atau lupa password -->
                    <div class="row text-center">
                        <div class="col-md-6 mt-3 small">
                            Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                                onclick="closeRegisterModal()">Login</a>
                        </div>
                        <div class=" col-md-6 mt-3 small">
                            Forgot your password? <a href="#" data-bs-toggle="modal"
                                data-bs-target="#forgotPasswordModal">Reset Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
.modal-lg {
    max-width: 60%;
    /* Adjust the percentage based on your preference */
}

.center-btn-container {
    display: flex;
    justify-content: center;
}


:target {
    display: block;
}

:target .modal-register {
    display: flex;
}

.small {
    font-size: 2.0em;
    /* Sesuaikan dengan ukuran font yang diinginkan */
}

.center-btn-container button {
    width: 20%;
    /* Adjust the width based on your preference */
}

/* Responsive styles for tablets and phones */
@media (max-width: 991px) {
    .modal-lg {
        max-width: 90%;
    }

    .center-btn-container button {
        width: 100%;
    }

    .small {
        font-size: 1em;
    }
}

/* Link alignment for mobile and tablet */
@media (max-width: 767px) {
    .row.text-center {
        text-align: center;
    }

    .row.text-center .col-md-6 {
        margin-bottom: 10px;
    }
}
    </style>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the register modal element
    var registerModal = document.getElementById('registerModal');

    // Function to close the register modal
    function closeRegisterModal() {
        registerModal.classList.remove('show');
        document.body.classList.remove('modal-open');
        registerModal.setAttribute('aria-hidden', 'true');
        registerModal.setAttribute('style', 'display: none');
        // Additional cleanup or actions if needed
    }

    // Attach click event to close button
    var closeButton = document.querySelector('#registerModal .btn-close');
    if (closeButton) {
        closeButton.addEventListener('click', closeRegisterModal);
    }

    // Attach click event to login link
    var loginLink = document.querySelector('#registerModal .row.text-center .col-md-6 a');
    if (loginLink) {
        loginLink.addEventListener('click', function(event) {
            event.preventDefault();
         
   closeRegisterModal();
            // Additional actions to open login modal if needed
        });
    }
});
    </script>