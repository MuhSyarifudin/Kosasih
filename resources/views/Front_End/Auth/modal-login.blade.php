    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom">
            <div class="modal-content">
                <!-- Isi konten modal login di sini -->
                <div class="modal-header text-white bg-custom">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form login atau konten modal lainnya -->
                <div class="modal-body">
                    <form action="{{ route('tamu.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email_tamu" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_tamu" name="email_tamu"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_tamu" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_tamu" name="password_tamu"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn bg-custom text-white">Login</button>
                    </form>
                    <!-- Link untuk pindah ke bagian register atau lupa password -->
                    <div class="mt-3 small">
                        Don't have an account yet? <a href="#" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Register</a>
                    </div>
                    <div class="mt-2 small">
                        Forgot your password? <a href="#" data-bs-toggle="modal"
                            data-bs-target="#forgotPasswordModal">Reset Password</a>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <style>
.modal-custom {
    max-width: 25%;
    /* Sesuaikan dengan lebar yang diinginkan */
}

.small {
    font-size: 0.8em;
    /* Sesuaikan dengan ukuran font yang diinginkan */
}

/* Responsive styles for tablets and phones */
@media (max-width: 767px) {
    .modal-custom {
        max-width: 90%;
        margin: auto;
    }

    .small {
        font-size: 0.9em;
        /* Sesuaikan dengan ukuran font yang diinginkan */
    }

    /* Center the text-align for mobile and tablet */
    .modal-body {
        text-align: center;
    }

    /* Adjust margin for the "Don't have an account yet?" link */
    .modal-body .mt-3 {
        margin-top: 10px;
    }

    /* Adjust margin for the "Forgot your password?" link */
    .modal-body .mt-2 {
        margin-top: 5px;
    }
}
    </style>
