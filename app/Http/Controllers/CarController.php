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
        $car = Car::findOrFail($carId);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to book a car.');
        }

        Booking::create([
            'car_id' => $car->id,
            'email' => $user->email,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'pickup_time' => $request->pickup_time,
            'dropoff_time' => $request->dropoff_time,
            'service' => $request->service,
            'status' => 'confirmed', // Make sure status is set appropriately
        ]);

        return redirect()->route('book', $carId)->with('success', 'Booking successful!');
    }
}
