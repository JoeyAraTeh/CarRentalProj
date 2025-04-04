@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Booking Details Section -->
    <div class="bg-[#E1F4F3] shadow-lg rounded-lg p-6 mb-8">
        <div class="flex flex-wrap gap-4">
            <!-- Pick-Up Location -->
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-semibold text-gray-700">Pick-Up Location</label>
                <div class="bg-white px-3 py-2 border rounded-md shadow-sm">{{ request('pickup') }}</div>
            </div>
            <!-- Drop-Off Location -->
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-semibold text-gray-700">Drop-Off Location</label>
                <div class="bg-white px-3 py-2 border rounded-md shadow-sm">{{ request('dropoff') }}</div>
            </div>
            <!-- Date Range -->
            <div class="flex-1 min-w-[220px]">
                <label class="block text-sm font-semibold text-gray-700">Pick-up & Drop-off Date</label>
                <div class="bg-white px-3 py-2 border rounded-md shadow-sm">{{ request('date_range') }}</div>
            </div>
            <!-- Pickup Time -->
            <div class="w-[12%]">
                <label class="block text-sm font-semibold text-gray-700">Pickup Time</label>
                <div class="bg-white px-3 py-2 border rounded-md shadow-sm">{{ request('pickup_time') }}</div>
            </div>
            <!-- Drop-off Time -->
            <div class="w-[12%]">
                <label class="block text-sm font-semibold text-gray-700">Drop-off Time</label>
                <div class="bg-white px-3 py-2 border rounded-md shadow-sm">{{ request('dropoff_time') }}</div>
            </div>
        </div>
    </div>

    <!-- Available Cars Section -->
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Available Cars by Category</h2>

    @php
    $cars = [
    // Economy
    ['name' => 'Toyota Vios', 'price' => 2500, 'seats' => 5, 'category' => 'Economy', 'image' => 'vios.jpg'],
    ['name' => 'Honda City', 'price' => 2600, 'seats' => 5, 'category' => 'Economy','image' => 'honda.jpg'],
    ['name' => 'Suzuki Celerio', 'price' => 2200, 'seats' => 5, 'category' => 'Economy','image' => 'suzuki.jpg'],

    // MPV
    ['name' => 'Mitsubishi Xpander', 'price' => 3500, 'seats' => 7, 'category' => 'MPV','image' => 'mitsubishi.jpg'],
    ['name' => 'Toyota Avanza', 'price' => 3300, 'seats' => 7, 'category' => 'MPV','image' => 'vios.jpg'],

    // SUV
    ['name' => 'Ford Everest', 'price' => 4500, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],
    ['name' => 'Toyota Fortuner', 'price' => 4700, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],
    ['name' => 'Isuzu MU-X', 'price' => 4600, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],

    // Van
    ['name' => 'Hyundai Starex', 'price' => 5000, 'seats' => 10, 'category' => 'Van','image' => 'vios.jpg'],
    ['name' => 'Nissan Urvan', 'price' => 5500, 'seats' => 15, 'category' => 'Van','image' => 'vios.jpg'],
    ['name' => 'Toyota Hiace', 'price' => 6000, 'seats' => 15, 'category' => 'Van','image' => 'vios.jpg'],
    ['name' => 'Foton Traveller XL', 'price' => 6200, 'seats' => 18, 'category' => 'Van','image' => 'vios.jpg'],

    // Pickup Truck
    ['name' => 'Toyota Hilux', 'price' => 4800, 'seats' => 5, 'category' => 'Pickup Truck','image' => 'vios.jpg'],
    ['name' => 'Ford Ranger Raptor', 'price' => 5200, 'seats' => 5, 'category' => 'Pickup Truck','image' => 'vios.jpg'],

    // Luxury
    ['name' => 'BMW 5 Series', 'price' => 12000, 'seats' => 5, 'category' => 'Luxury','image' => 'vios.jpg'],
    ['name' => 'Mercedes-Benz E-Class', 'price' => 13000, 'seats' => 5, 'category' => 'Luxury','image' => 'vios.jpg'],
];

        $groupedCars = collect($cars)->groupBy('category');
    @endphp

    @foreach($groupedCars as $category => $categoryCars)
        <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">{{ $category }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categoryCars as $car)
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
    <img src="{{ asset('images/cars/' . $car['image']) }}" alt="{{ $car['name'] }}" class="w-full h-48 object-cover rounded-md mb-4">
    <h4 class="text-xl font-semibold text-gray-800">{{ $car['name'] }}</h4>
    <p class="text-gray-600 mt-2">Price per day: <span class="font-bold">₱{{ number_format($car['price'], 2) }}</span></p>
    <p class="text-gray-600">Seating Capacity: <span class="font-bold">{{ $car['seats'] }}</span> seaters</p>
</div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
