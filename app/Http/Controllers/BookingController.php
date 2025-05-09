<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Car;


class BookingController extends Controller
{
    // Display user's bookings
    public function myBookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('email', $user->email)->get();


        return view('bookings', compact('bookings'));
    }


    // Show booking form for a specific car
    public function showBookingForm(Request $request, $id)
    {
        $car = Car::findOrFail($id);


        // Retrieve the date range and split it into a single pick-up and drop-off date
        $date_range = $request->get('date_range');
        $pickup_date = null;
        $dropoff_date = null;


        if ($date_range) {
            // Assuming the date range is in the format "YYYY-MM-DD to YYYY-MM-DD"
            list($pickup_date, $dropoff_date) = explode(' to ', $date_range);
        }


        return view('book', [
            'car' => $car,
            'pickup' => $request->pickup,
            'dropoff' => $request->dropoff,
            'pickup_time' => $request->pickup_time,
            'dropoff_time' => $request->dropoff_time,
            'pickup_date' => $pickup_date,
            'dropoff_date' => $dropoff_date,
        ]);
    }


   public function submitBooking(Request $request, $id)
{
    // Validate base fields
    $validated = $request->validate([
        'pickup_location' => 'required|string',
        'dropoff_location' => 'required|string',
        'pickup_time' => 'required',
        'dropoff_time' => 'required',
        'service' => 'nullable|string',
        'email' => 'required|email',
        'date_range' => 'required|string',
    ]);

    // Split date range like "May 10, 2025 to May 12, 2025"
    $dates = explode(' to ', $validated['date_range']);

    if (count($dates) !== 2) {
        return back()->withErrors(['date_range' => 'Invalid date range format.']);
    }

    // Parse to Y-m-d format
    $pickup_date = date('Y-m-d', strtotime($dates[0]));
    $dropoff_date = date('Y-m-d', strtotime($dates[1]));

    // Create booking
    Booking::create([
        'car_id' => $id,
        'pickup_location' => $validated['pickup_location'],
        'dropoff_location' => $validated['dropoff_location'],
        'pickup_date' => $pickup_date,
        'dropoff_date' => $dropoff_date,
        'pickup_time' => $validated['pickup_time'],
        'dropoff_time' => $validated['dropoff_time'],
        'service' => $validated['service'],
        'email' => $validated['email'],
        'status' => 'pending',
    ]);

    return redirect()->route('homepage')->with('success', 'Booking successful!');
}
}
