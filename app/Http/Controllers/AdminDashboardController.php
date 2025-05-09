<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use App\Models\ContactMessage;

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
    
        // Available cars = Total - Currently rented (excluding confirmed bookings)
        $availableCars = $totalCars - $rentedCars;
    
        // Completed rentals count (rentals that are marked as completed)
        $completedRentals = Booking::where('status', 'completed')->count();

        // Pass the data to the view
        return view('admin.dashboard', [
            'availableCars' => $availableCars,      // Total available cars (not rented)
            'rentedCars' => $rentedCars,            // Cars that are currently rented (confirmed bookings)
            'completedRentals' => $completedRentals // Total completed rentals
        ]);
    }


    public function viewMessages()
{
    // Assuming you have a Message model to fetch messages from the database
    $messages = \App\Models\ContactMessage::all(); // Fetch all messages from the 'messages' table

    return view('admin.messages', compact('messages')); // Pass messages to the view
}

}

