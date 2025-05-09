@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 animate-fade-in">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-8">
        Book: {{ $car['brand'] }} {{ $car['model'] }}
    </h2>

    <form action="{{ route('book', $car['id']) }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        @csrf

        <!-- Pick-Up Location -->
        <div>
            <label for="pickup_location" class="block text-sm font-medium text-gray-700">Pick-Up Location</label>
            <input type="text" name="pickup_location" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
        </div>

        <!-- Drop-Off Location -->
        <div>
            <label for="dropoff_location" class="block text-sm font-medium text-gray-700">Drop-Off Location</label>
            <input type="text" name="dropoff_location" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pick-Up Date -->
            <div>
                <label for="pickup_date" class="block text-sm font-medium text-gray-700">Pick-Up Date</label>
                <input type="date" name="pickup_date" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
            </div>

            <!-- Drop-Off Date -->
            <div>
                <label for="dropoff_date" class="block text-sm font-medium text-gray-700">Drop-Off Date</label>
                <input type="date" name="dropoff_date" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
            </div>

            <!-- Pick-Up Time -->
            <div>
                <label for="pickup_time" class="block text-sm font-medium text-gray-700">Pick-Up Time</label>
                <input type="time" name="pickup_time" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
            </div>

            <!-- Drop-Off Time -->
            <div>
                <label for="dropoff_time" class="block text-sm font-medium text-gray-700">Drop-Off Time</label>
                <input type="time" name="dropoff_time" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200" required>
            </div>

            <!-- Select a Service -->
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">Choose a Service</label>
                <select name="service" id="service" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 transition duration-200">
                    <option value="">-- Select a service (optional) --</option>
                    <option value="Self-Drive Rentals">Self-Drive Rentals</option>
                    <option value="Chauffeur Services">Chauffeur Services</option>
                    <option value="Airport Transfers">Airport Transfers</option>
                    <option value="Long-Term Rentals">Long-Term Rentals</option>
                    <option value="Corporate Rentals">Corporate Rentals</option>
                    <option value="Tour Packages">Tour Packages</option>
                </select>
            </div>
        </div>
        @auth
    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
@endauth

<div class="pt-4">
    <button type="submit" class="w-full md:w-auto bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition-all duration-300">
        Confirm Booking
    </button>
</div>
    </form>
</div>

<!-- Tailwind Animation -->
<style>
@keyframes fade-in {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}
</style>
@endsection
