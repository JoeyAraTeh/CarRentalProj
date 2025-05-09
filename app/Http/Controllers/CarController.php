<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    // Display the car listings grouped by category
    public function index()
    {
        $cars = Car::all();
        $groupedCars = $cars->groupBy('category');

        // Get IDs of currently rented cars (e.g. bookings that are confirmed or active)
        $rentedCarIds = Booking::where('status', 'confirmed')->pluck('car_id')->toArray();

        return view('car', compact('groupedCars', 'rentedCarIds'));
    }

   
}
