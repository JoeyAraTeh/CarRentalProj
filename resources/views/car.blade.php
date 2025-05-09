@extends('layouts.app')

@section('content')
<div class="px-6 md:px-16 py-12 mt-16"> <!-- Added horizontal padding -->
    <!-- Booking Details -->
    @if(request()->has('pickup') && request()->has('dropoff') && request()->has('date_range') && request()->has('pickup_time') && request()->has('dropoff_time'))
        <div class="bg-[#1F1F1F] text-white rounded-xl p-6 mb-12 shadow-xl">
            <h2 class="text-2xl font-bold mb-6 text-[#E1F4F3]">Booking Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm text-[#E1F4F3] mb-1">Pick-Up Location</label>
                    <div class="bg-white text-[#333] rounded-lg p-3 border border-[#706C61]">{{ request('pickup') }}</div>
                </div>
                <div>
                    <label class="block text-sm text-[#E1F4F3] mb-1">Drop-Off Location</label>
                    <div class="bg-white text-[#333] rounded-lg p-3 border border-[#706C61]">{{ request('dropoff') }}</div>
                </div>
                <div>
                    <label class="block text-sm text-[#E1F4F3] mb-1">Date Range</label>
                    <div class="bg-white text-[#333] rounded-lg p-3 border border-[#706C61]">{{ request('date_range') ?? 'No date selected' }}</div>
                </div>
                <div>
                    <label class="block text-sm text-[#E1F4F3] mb-1">Pickup Time</label>
                    <div class="bg-white text-[#333] rounded-lg p-3 border border-[#706C61]">{{ request('pickup_time') }}</div>
                </div>
                <div>
                    <label class="block text-sm text-[#E1F4F3] mb-1">Drop-off Time</label>
                    <div class="bg-white text-[#333] rounded-lg p-3 border border-[#706C61]">{{ request('dropoff_time') }}</div>
                </div>
            </div>
        </div>
    @endif


    <!-- Category Filter -->
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-[#333]">Available Cars</h2>
        <div>
            <label for="categoryFilter" class="mr-2 font-medium text-[#333]">Filter:</label>
            <select id="categoryFilter" class="border border-[#706C61] pr-8 pl-3 py-2 rounded-md shadow-sm" onchange="filterCars(this.value)">
                <option value="all">All Categories</option>
                @foreach($groupedCars as $category => $categoryCars)
                    <option value="{{ Str::slug($category) }}">{{ $category }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <!-- Car Listings -->
    <div class="car-listings">
        @foreach($groupedCars as $category => $categoryCars)
        <div class="car-category-block mb-10" data-category="{{ Str::slug($category) }}">
            <h3 class="text-xl font-semibold text-[#333] mb-4">{{ $category }}</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach($categoryCars as $car)
                @php $isRented = in_array($car->id, $rentedCarIds ?? []); @endphp
                <div class="relative bg-white rounded-lg shadow p-4 text-sm hover:shadow-inner transition-shadow duration-300 {{ $isRented ? 'opacity-70' : '' }}">
                @if($isRented)
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center z-10 rounded-lg">
                    <span class="text-white font-bold">Not Available</span>
                </div>
                @endif

                <!-- Car Image -->
                <img src="{{ asset('images/cars/' . $car->image) }}" class="h-32 w-full object-cover rounded-md mb-3" alt="{{ $car->name }}">

                <!-- Car Title -->
                <h4 class="font-bold text-[rgb(51,51,51)] text-base mb-1 truncate">{{ $car->brand }} {{ $car->model }}</h4>

                <!-- Car Pricing -->
                <p class="text-[#333] font-semibold text-sm mb-2">₱{{ number_format($car->rental_price_per_day, 2) }} <span class="text-xs font-normal text-[#706C61]">/ day</span></p>

                <!-- Car Info Grid -->
                <div class="grid grid-cols-2 gap-1 text-xs text-[#706C61] mb-3">
                    <div><span class="font-medium text-[#333]">Year:</span> {{ $car->year }}</div>
                    <div><span class="font-medium text-[#333]">Seats:</span> {{ $car->seats }}</div>
                    <div><span class="font-medium text-[#333]">Type:</span> {{ $car->type }}</div>
                    <div><span class="font-medium text-[#333]">Category:</span> {{ $car->category }}</div>
                </div>

                <!-- Book Now Button -->
                @if(!$isRented)
               <a href="{{ route('book', ['id' => $car->id]) }}?pickup={{ request('pickup') }}&dropoff={{ request('dropoff') }}&date_range={{ request('date_range') }}&pickup_time={{ request('pickup_time') }}&dropoff_time={{ request('dropoff_time') }}"
   class="inline-block w-full text-center bg-[#706C61] text-[#ffffff] px-3 py-2 rounded hover:bg-[#333] hover:text-white transition text-xs font-medium">
   Book Now
</a>
                @endif
            </div>


                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- JS Filter -->
<script>
    function filterCars(selectedCategory) {
        document.querySelectorAll('.car-category-block').forEach(block => {
            const category = block.getAttribute('data-category');
            block.style.display = (selectedCategory === 'all' || selectedCategory === category) ? 'block' : 'none';
        });
    }
</script>
@endsection