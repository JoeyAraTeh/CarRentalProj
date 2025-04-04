<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('homepage'); // Redirect to homepage
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
    Route::get('/cars', [CarsController::class, 'index'])->name('cars');
    Route::get('/car', [CarController::class, 'index'])->name('car');

    // 👇 Booking routes
    Route::get('/car/{id}/book', [CarController::class, 'showBookingForm'])->name('car.book');
    Route::post('/car/{id}/book', [CarController::class, 'submitBooking'])->name('car.book.submit');
});

require __DIR__.'/auth.php';
