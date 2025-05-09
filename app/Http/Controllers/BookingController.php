<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    // Display user's bookings
    public function myBookings()
    {
        $user = Auth::user();
        $bookings = Booking::where('email', $user->email)->get();

        return view('bookings', compact('bookings'));
    }

    // Update the status of a booking
    public function updateBookingStatus(Request $request, $bookingId)
    {
        // Validate the request (ensure status is valid)
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking = Booking::findOrFail($bookingId);

        // Ensure the user is the one who made the booking or an admin
        if ($booking->email !== Auth::user()->email && !Auth::user()->is_admin) {
            return redirect()->route('bookings')->with('error', 'You do not have permission to change this booking status.');
        }

        // Update status
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('bookings')->with('success', 'Booking status updated successfully!');
    }
}
