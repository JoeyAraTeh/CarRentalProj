@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Available Cars</h2>

    <!-- 🔽 Category Filter -->
    <div class="mb-8">
        <label for="categoryFilter" class="block text-lg font-semibold text-gray-700 mb-2">Filter by Category:</label>
        <select id="categoryFilter" class="border-gray-300 rounded-md shadow-sm w-full sm:w-64 p-2" onchange="filterCars(this.value)">
            <option value="all">All Categories</option>
            @foreach($groupedCars as $category => $categoryCars)
                <option value="{{ Str::slug($category) }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <!-- 🚗 Car Listings -->
    @php $carIndex = 0; @endphp
    @foreach($groupedCars as $category => $categoryCars)
        <div class="car-category-block" data-category="{{ Str::slug($category) }}">
            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">{{ $category }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categoryCars as $car)
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{ asset('images/cars/' . $car['image']) }}" alt="{{ $car['name'] }}" class="w-full h-48 object-cover rounded-md mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">{{ $car['name'] }}</h4>
                    <p class="text-gray-600 mt-2">Price per day: <span class="font-bold">₱{{ number_format($car['price'], 2) }}</span></p>
                    <p class="text-gray-600">Seating Capacity: <span class="font-bold">{{ $car['seats'] }}</span> seaters</p>
                    
                    <!-- ✅ Book Now Button -->
                    <a href="{{ route('car.book', ['id' => $carIndex]) }}" class="inline-block mt-4 bg-[#3D53CF] text-white px-5 py-2 rounded-md hover:bg-[#2e42aa] transition">
                        Book Now
                    </a>
                </div>
                @php $carIndex++; @endphp
                @endforeach
            </div>
        </div>
    @endforeach
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
