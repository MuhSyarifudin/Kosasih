@extends('Back_End.app')

@section('title', 'Profile')
@section('page', 'Profile')
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body text-center">
                <img src="/images/staff/1.jpg" alt="Profile Picture" class="img-fluid rounded-circle profile-img mb-3">
                <h2 class="profile-username">{{ auth()->user()->username }}</h2>
                <p class="profile-email">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Information</h4>
                <p><strong>Name:</strong> {{ auth()->user()->username }} </p>
                <p><strong>Role:</strong> {{ auth()->user()->role }} </p>
            </div>
        </div>


        <!-- Change Password Modal -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                    Change Password
                </button>
            </div>
        </div>

        <!-- Account Settings Modal -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Account Settings</h4>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#accountSettingsModal">
                    Account Settings
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your change password form fields here -->
                <form action="{{ route('change.password') }}" method="POST">
                    @csrf
                    <!-- Add your change password form fields here -->
                    <!-- Example: -->
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Account Settings Modal -->
<div class="modal fade" id="accountSettingsModal" tabindex="-1" aria-labelledby="accountSettingsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountSettingsModalLabel">Account Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your account settings form fields here -->
                <form action="{{ route('account.settings') }}" method="POST">
                    @csrf
                    <!-- Add your account settings form fields here -->
                    <!-- Example: -->
                    <div class="mb-3">
                        <label for="setting_field" class="form-label">Setting Field</label>
                        <input type="text" class="form-control" id="setting_field" name="setting_field" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.profile-img {
    width: 100%;
    max-width: 150px;
    height: auto;
    border-radius: 50%;
}

.profile-username {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.profile-email {
    font-size: 16px;
    color: #6c757d;
    margin-bottom: 20px;
}



.card {
    margin-bottom: 20px;
}
</style>
@endsection