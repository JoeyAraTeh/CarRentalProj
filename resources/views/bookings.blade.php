@extends('layouts.app')

@section('content')
<div class="mt-16">
    <div class="container mx-auto px-4 py-10 bg-white min-h-screen">
        <h2 class="text-3xl font-bold text-black mb-8">My Booking History</h2>

            @if ($bookings->isEmpty())
                <p class="text-black-400">You don't have any bookings yet.</p>
            @else
            <div class="space-y-6 max-w-md ml-0 sm:ml-4">
                <!-- displays each car booking's details -->
                @foreach ($bookings as $booking)
                    <div class="bg-[#1a1a1a] rounded-xl shadow-lg p-6 border-l-4 border-gray-500">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-white">
                                    {{ $booking->car->brand }} {{ $booking->car->model }}
                                </h3>
                                <span class="text-sm text-gray-400">
                                    Ref: #{{ $booking->id }}
                                </span>
                            </div>

                            {{-- Status Badge --}}
                            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                @if($booking->status === 'confirmed') bg-green-600 text-white
                                @elseif($booking->status === 'pending') bg-yellow-500 text-white
                                @elseif($booking->status === 'completed') bg-blue-600 text-white
                                @else bg-gray-500 text-white
                                @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-300">
                            <div>
                                <span class="font-semibold text-white">Pickup Location:</span><br>
                                {{ $booking->pickup_location }}
                            </div>
                            <div>
                                <span class="font-semibold text-white">Dropoff Location:</span><br>
                                {{ $booking->dropoff_location }}
                            </div>
                            <div>
                                <span class="font-semibold text-white">Service:</span><br>
                                {{ $booking->service ?? 'N/A' }}
                            </div>
                            <div>
                                <span class="font-semibold text-white">Pickup Date/Time:</span><br>
                                {{ $booking->pickup_date }} at {{ $booking->pickup_time }}
                            </div>
                            <div>
                                <span class="font-semibold text-white">Dropoff Date/Time:</span><br>
                                {{ $booking->dropoff_date }} at {{ $booking->dropoff_time }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
