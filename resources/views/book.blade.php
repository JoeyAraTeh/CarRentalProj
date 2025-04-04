@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ $car['id'] }} Booking</h2>

    <form action="{{ route('car.book', $car['id']) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="pickup_location" class="block text-gray-700">Pick-Up Location</label>
            <input type="text" name="pickup_location" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="dropoff_location" class="block text-gray-700">Drop-Off Location</label>
            <input type="text" name="dropoff_location" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="pickup_date" class="block text-gray-700">Pick-Up Date</label>
            <input type="date" name="pickup_date" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="dropoff_date" class="block text-gray-700">Drop-Off Date</label>
            <input type="date" name="dropoff_date" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="pickup_time" class="block text-gray-700">Pick-Up Time</label>
            <input type="time" name="pickup_time" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="dropoff_time" class="block text-gray-700">Drop-Off Time</label>
            <input type="time" name="dropoff_time" class="mt-1 w-full px-3 py-2 border rounded-md" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Confirm Booking</button>
    </form>
</div>
@endsection
