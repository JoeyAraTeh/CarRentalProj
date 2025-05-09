
@extends('layouts.app')


@section('content')
<div class="container mx-auto max-w-3xl px-6 py-12 animate-fade-in">
    <h2 class="text-4xl font-bold text-gray-900 mb-10">
        Book: {{ $car['brand'] }} {{ $car['model'] }}
    </h2>


    <form action="{{ route('book', $car['id']) }}" method="POST" class="bg-white p-10 rounded-3xl shadow-lg space-y-8">
        @csrf


        <!-- Pick-Up & Drop-Off Locations -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="pickup_location" class="block mb-2 text-sm font-medium text-gray-700">Pick-Up Location</label>
                <input type="text" id="pickup_location" name="pickup_location"
                    value="{{ old('pickup_location', $pickup ?? '') }}"
                    class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>


            <div>
                <label for="dropoff_location" class="block mb-2 text-sm font-medium text-gray-700">Drop-Off Location</label>
                <input type="text" id="dropoff_location" name="dropoff_location"
                    value="{{ old('dropoff_location', $dropoff ?? '') }}"
                    class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>


        <!-- Date Range Picker Section -->
        <div class="flex-1 min-w-[220px]">
            <label for="date-range" class="block text-sm font-semibold text-gray-700">Pick-up & Drop-off Date</label>
            <input type="text" name="date_range" id="date-range" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm" placeholder="Select date"
                value="{{ old('date_range', isset($pickup_dropoff_date) ? $pickup_dropoff_date : '') }}" required>
        </div>


        <!-- Pick-Up & Drop-Off Time Section -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="pickup_time" class="block mb-2 text-sm font-medium text-gray-700">Pick-Up Time</label>
                <input type="time" id="pickup_time" name="pickup_time"
                    value="{{ old('pickup_time', isset($pickup_time) ? $pickup_time : '') }}"
                    class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>


            <div>
                <label for="dropoff_time" class="block mb-2 text-sm font-medium text-gray-700">Drop-Off Time</label>
                <input type="time" id="dropoff_time" name="dropoff_time"
                    value="{{ old('dropoff_time', isset($dropoff_time) ? $dropoff_time : '') }}"
                    class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>


        <!-- Service Selection -->
        <div>
            <label for="service" class="block mb-2 text-sm font-medium text-gray-700">Choose a Service</label>
            <select name="service" id="service"
                class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select a service (optional) --</option>
                <option value="Self-Drive Rentals">Self-Drive Rentals</option>
                <option value="Chauffeur Services">Chauffeur Services</option>
                <option value="Airport Transfers">Airport Transfers</option>
                <option value="Long-Term Rentals">Long-Term Rentals</option>
                <option value="Corporate Rentals">Corporate Rentals</option>
                <option value="Tour Packages">Tour Packages</option>
            </select>
        </div>


        @auth
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
        @endauth


        <div class="pt-6">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 shadow-lg">
                Confirm Booking
            </button>
        </div>
    </form>
</div>


<!-- Add Flatpickr JS and CSS -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    flatpickr("#date-range", {
        mode: "range", // Range selection mode
        dateFormat: "F j, Y", // Display the date in a human-readable format like "May 9, 2025"
        minDate: "today", // Ensure the date is not earlier than today
        onChange: function(selectedDates, dateStr, instance) {
            // Ensure both pickup and dropoff are handled properly
            if (selectedDates.length === 2) {
                let formattedDateRange = selectedDates.map(date => flatpickr.formatDate(date, "F j, Y")).join(" to ");
                document.querySelector('input[name="date_range"]').value = formattedDateRange;
            }
        }
    });
</script>


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


