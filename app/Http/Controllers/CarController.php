<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Booking;

class CarController extends Controller
{
    // Display the car listings grouped by category
    public function index()
    {
        $cars = Car::all();
        $groupedCars = $cars->groupBy('category');

        return view('car', compact('groupedCars'));
    }

   
    public function showBookingForm($id)
    {
        $car = Car::find($id);

        if (!$car) {
            abort(404, 'Car not found.');
        }

        return view('book', compact('car'));
    }

    public function submitBooking(Request $request, $carId)
    {
        // Find the car using the ID
        $car = Car::findOrFail($carId);
    
        // Create a new booking
        $booking = Booking::create([
            'car_id' => $car->id,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'pickup_time' => $request->pickup_time,
            'dropoff_time' => $request->dropoff_time,
            'service' => $request->service,
        ]);

        return redirect()->route('book', $carId)->with('success', 'Booking successful!');

    }
}
