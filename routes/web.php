<?php

use App\Models\KetersediaanHomestay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomGalleryController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReviewGalleryController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\KetersediaanHomestayController;
use App\Http\Controllers\AuthGuests\RegisterGuestsController;

// Authentication Admin & User
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registeruser', [AuthController::class, 'registeruser']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authentication']);
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileAdminController::class, 'showProfile'])->name('profile');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
    Route::post('/account-settings', [UserController::class, 'accountSettings'])->name('account.settings');
    // Add other routes as needed
});
// Forgot password
Route::get('/forgot', [AuthController::class, 'showforgot'])->name('forgot');
Route::post('/forgot-password', [AuthController::class, 'forgotaction'])->name('forgotaction');

// Authentication Guests
Route::post('/register-tamu', [RegisterGuestsController::class, 'registerTamu'])->name('tamu.register');
Route::post('/login-tamu', [RegisterGuestsController::class, 'loginTamu'])->name('tamu.login');
Route::post('/logout-tamu', [RegisterGuestsController::class, 'logoutTamu'])->name('tamu.logout');


// Back End | Dashboard | Admin Pages
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
Route::resource('region', RegionController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('homestay', HomestayController::class);
Route::resource('facility', FacilityController::class);
Route::resource('room', RoomController::class);
Route::resource('roomGallery', RoomGalleryController::class);
Route::resource('guest', GuestsController::class);
Route::resource('message', MessageController::class);
Route::resource('reservation', ReservationsController::class);
Route::resource('availability-homestay', KetersediaanHomestayController::class);
Route::resource('payment', PaymentsController::class);
Route::resource('staff', StaffController::class);
Route::resource('review', ReviewsController::class);
Route::resource('reviewGallery', ReviewGalleryController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('event', EventsController::class);
Route::resource('tag', TagsController::class);
Route::resource('service', ServiceController::class);
Route::resource('contacts', ContactController::class);
Route::resource('calender', CalenderController::class);
Route::resource('log', LogsController::class);

Route::get('/setting', [GeneralSettingController::class, 'index'])->name('setting.index');
Route::put('/setting/{id}', [GeneralSettingController::class, 'update'])->name('setting.update');
Route::get('/settings', [GeneralSettingController::class, 'index'])->name('settings.index');
Route::post('/settings/update', [GeneralSettingController::class, 'settingupdate'])->name('update-settings');

// Rute untuk mengaktifkan mode shutdown
Route::post('toggle-shutdown', [GeneralSettingController::class, 'toggleShutdown'])->name('toggleShutdown');


// Front End | Home Page | User Pages
Route::get('/', [HomePageController::class, 'home']);
Route::get('/rooms', [HomePageController::class, 'room']);
Route::get('/contact', [HomePageController::class, 'contact']);
Route::get('/regions/{kota}', [HomePageController::class, 'show'])->name('regions.show');
// Authentication Middleware Applied to the Following Routes
Route::middleware('auth')->group(function () {
    Route::post('/booking/{homestay_id}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/submit-booking', [BookingController::class, 'store'])->name('booking.submit');
    Route::post('/check-availability', [AvailabilityController::class, 'checkAvailability'])->name('check.availability');
    // Add other authenticated routes here...

    // Dashboard Guests || Frontend
    Route::get('/profile-guest', [HomePageController::class, 'showGuest'])->name('tamu.profile');
    Route::post('/profile/update', [HomePageController::class, 'updateGuest'])->name('tamu.update');
    Route::get('/chat-guest', [HomePageController::class, 'chatGuest'])->name('tamu.pesan');
    Route::get('/invoice', [InvoiceController::class, 'invoiceGuest'])->name('tamu.invoice');
    Route::post('/confirm-payment/{id}', [InvoiceController::class, 'confirmPayment'])->name('tamu.payment');

    Route::get('/generate-invoice/{id}', [InvoiceController::class, 'generateInvoice'])->name('generate.invoice');
    Route::get('/review-guest', [ReviewController::class, 'reviewGuest'])->name('tamu.review');
    // Menyimpan ulasan dari formulir
    Route::post('/submit-review', [ReviewController::class, 'submitReview'])->name('submit.review');
});
// Route::get('/bwi', [HomePageController::class, 'bwi']);
// Route::get('/bwisearch', [HomePageController::class, 'bwisearch']);
// Route::get('/dki', [HomePageController::class, 'dki']);
Route::get('/facilities', [HomePageController::class, 'facility']);
Route::get('/about', [HomePageController::class, 'about']);
Route::get('/contact', [HomePageController::class, 'contact']);
Route::post('/contact', [HomePageController::class, 'submitForm'])->name('contact.submit');