<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;

class CarController extends Controller
{
    // Display the car listings grouped by category
    public function index()
    {
        $cars = Car::all();
        $groupedCars = $cars->groupBy('category');

        // Get IDs of currently rented cars
        $rentedCarIds = Booking::where('status', 'confirmed')->pluck('car_id')->toArray();

        return view('car', compact('groupedCars', 'rentedCarIds'));
    }
}
