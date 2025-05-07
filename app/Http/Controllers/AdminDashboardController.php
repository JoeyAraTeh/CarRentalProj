<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total number of cars in the system
        $totalCars = Car::count();
    
        // Get car_ids with active rentals (confirmed bookings only)
        $rentedCarIds = Booking::where('status', 'confirmed')
                                ->pluck('car_id')
                                ->unique();
    
        // Count how many unique cars are currently rented
        $rentedCars = $rentedCarIds->count();
    
        // Available cars = Total - Currently rented
        $availableCars = $totalCars - $rentedCars;
    
        // Completed rentals count
        $completedRentals = Booking::where('status', 'completed')->count();
    
        return view('admin.dashboard', [
            'availableCars' => $availableCars,      // Replace totalCars with availableCars
            'rentedCars' => $rentedCars,            // Currently rented (confirmed)
            'completedRentals' => $completedRentals // Rentals that were completed
        ]);
    }    

}    
