<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('homepage');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔒 Authenticated user routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // General pages
    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

    // Car listing
    Route::get('/car', [CarController::class, 'index'])->name('car');

    // Booking routes
    Route::get('/car/{id}/book', [BookingController::class, 'showBookingForm'])->name('book');
    Route::post('/car/{id}/book', [BookingController::class, 'submitBooking'])->name('book');
    Route::get('/bookings', [BookingController::class, 'myBookings'])->name('bookings');
});

// Admin-only routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Admin car routes
    Route::get('/cars', [AdminCarController::class, 'adminViewAllCars'])->name('admin.cars');
    Route::get('/rentals', [AdminCarController::class, 'viewRentals'])->name('admin.rentals');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('admin.cars.create');
    Route::delete('/cars/{id}', [AdminCarController::class, 'destroy'])->name('admin.cars.destroy');
    Route::get('/cars/edit/{id}', [AdminCarController::class, 'edit'])->name('admin.edit');

    // Rental status update
    Route::put('/rentals/{id}/status', [AdminCarController::class, 'updateRentalStatus'])->name('admin.updateRentalStatus');
});

// Admin car category summary (outside prefix group)
Route::get('/admin/car-category-summary', [AdminCarController::class, 'carCategorySummary'])->name('admin.car_category_summary');

require __DIR__.'/auth.php';
