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

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Available Cars</h2>

    <!-- 🔽 Category Filter -->
    <div class="mb-8">
        <label for="categoryFilter" class="block text-lg font-semibold text-gray-700 mb-2">Filter by Category:</label>
        <select id="categoryFilter" class="border-gray-300 rounded-md shadow-sm w-full sm:w-64 p-2 transition duration-300 ease-in-out" onchange="filterCars(this.value)">
            <option value="all">All Categories</option>
            @foreach($groupedCars as $category => $categoryCars)
                <option value="{{ Str::slug($category) }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <!-- 🚗 Car Listings -->
    @php $carIndex = 0; @endphp
    <div class="car-listings">
        @foreach($groupedCars as $category => $categoryCars)
            <div class="car-category-block" data-category="{{ Str::slug($category) }}">
                <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">{{ $category }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categoryCars as $car)
    @php
        $isRented = in_array($car->id, $rentedCarIds ?? []);
    @endphp
    <div class="relative car-card bg-white shadow-lg rounded-lg p-6 text-center transform hover:scale-105 transition duration-500 ease-in-out hover:shadow-xl overflow-hidden {{ $isRented ? 'opacity-80' : '' }}">
        @if($isRented)
            <div class="absolute inset-0 bg-black bg-opacity-60 z-10 flex items-center justify-center rounded-lg">
                <span class="text-white text-xl font-bold">Not Available</span>
            </div>
        @endif

        <img src="{{ asset('images/cars/' . $car->image) }}" class="h-40 w-full object-cover rounded-md mb-4 transition-transform duration-300 transform hover:scale-110" alt="{{ $car->name }}">
        <h4 class="text-lg font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</h4>
        <p class="text-gray-600">Category: {{ $car->category }}</p>
        <p class="text-gray-600">Year: {{ $car->year }}</p>
        <p class="text-gray-800 font-semibold">₱{{ number_format($car->rental_price_per_day, 2) }} per day</p>
        <p class="text-gray-600">Seats: {{ $car->seats }}</p>
        <p class="text-gray-600">Type: {{ $car->type }}</p>
        
        @if(!$isRented)
            <a href="{{ route('book', ['id' => $car->id]) }}" class="inline-block mt-4 bg-[#3D53CF] text-white px-5 py-2 rounded-md hover:bg-[#2e42aa] transition">Book Now</a>
        @endif
    </div>
@endforeach

                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- 🔧 JS for Filtering -->
<script>
    function filterCars(selectedCategory) {
        const blocks = document.querySelectorAll('.car-category-block');

        blocks.forEach(block => {
            const category = block.getAttribute('data-category');
            if (selectedCategory === 'all' || selectedCategory === category) {
                block.style.display = 'block';
            } else {
                block.style.display = 'none';
            }
        });
    }
</script>

@endsection
