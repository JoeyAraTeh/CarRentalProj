@extends('layouts.app')

@section('content')
<div class="relative bg-cover bg-center h-[500px]" style="background-image: url('{{ asset('/carcover.png') }}'); background-repeat: no-repeat;">
    <!-- <div class="absolute inset-0  flex flex-col">
        <div class=" mt-96 ml-6">
            <a href="{{ route('services') }}" class="px-6 py-3 text-lg font-semibold bg-[#3D53CF] text-white rounded-lg shadow-md hover:bg-[#3345ad] transition duration-300">
                Explore Services
            </a>
            <a href="{{ route('contacts') }}" class="ml-4 px-6 py-3 text-lg font-semibold border border-[#3D53CF] text-[#3D53CF] rounded-lg hover:bg-[#3345ad] hover:text-white transition duration-300">
                Contact Us
            </a>
        </div>
    </div> -->
</div>

<!-- Booking Details -->
<div class="container mx-auto px-4 relative -mt-5 z-10">
    <div class="bg-white shadow-lg rounded-lg p-4 flex flex-wrap md:flex-nowrap items-center gap-4">
        <!-- Wrap inputs inside a form -->
<form action="{{ route('car') }}" method="GET" class="w-full flex flex-wrap gap-4">
    <!-- Pick-Up Location -->
    <div class="flex-1 min-w-[200px]">
        <label for="pickup" class="block text-sm font-semibold text-gray-700">Pick-Up Location</label>
        <input type="text" name="pickup" id="pickup" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm" placeholder="Enter location" required>
    </div>

    <!-- Drop-Off Location -->
    <div class="flex-1 min-w-[200px]">
        <label for="dropoff" class="block text-sm font-semibold text-gray-700">Drop-Off Location</label>
        <input type="text" name="dropoff" id="dropoff" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm" placeholder="Enter location" required>
    </div>

    <!-- Date Range Picker -->
    <div class="flex-1 min-w-[220px]">
        <label for="date-range" class="block text-sm font-semibold text-gray-700">Pick-up & Drop-off Date</label>
        <input type="text" name="date_range" id="date-range" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm" placeholder="Select date" required>
    </div>

    <!-- Pickup Time -->
    <div class="w-[12%]">
        <label class="block text-gray-700 text-sm font-semibold">Pickup Time</label>
        <input type="time" name="pickup_time" class="mt-1 w-full px-3 py-2 border rounded-md" required>
    </div>

    <!-- Drop-off Time -->
    <div class="w-[12%]">
        <label class="block text-gray-700 text-sm font-semibold">Drop-off Time</label>
        <input type="time" name="dropoff_time" class="mt-1 w-full px-3 py-2 border rounded-md" required>
    </div>

    <!-- Submit Button -->
    <div class="w-auto flex items-end">
        <button type="submit" class="flex items-center bg-[#333333] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#555555] transition mt-6">
            Find a Car
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10.5a5.5 5.5 0 1 0-11 0 5.5 5.5 0 0 0 11 0z" />
            </svg>
        </button>
    </div>
</form>

        </div>
    </div>
</div>


<link rel="stylesheet" href="{{ asset('node_modules/flatpickr/dist/flatpickr.min.css') }}">
<script src="{{ asset('node_modules/flatpickr/dist/flatpickr.js') }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Initialize Flatpickr for Date Range -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#date-range", {
            mode: "range",  
            dateFormat: "M d",
            minDate: "today",  
            showMonths: 2,  
        });
    });
</script>

<!-- Available Cars Section -->
<section class="py-12">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-[#333333]">Available Cars</h2>
            <a href="{{ route('car') }}" class="text-[#333333] font-semibold hover:text-[#555555] transition flex items-center">
                View All Cars <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        @foreach($groupedCars as $category => $categoryCars)
            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">{{ $category }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categoryCars as $car)
                    <div class="bg-white shadow-md rounded-lg p-5 text-center">
                        <img src="{{ asset('images/cars/' . $car['image']) }}" alt="{{ $car['name'] }}" class="w-full h-48 object-cover rounded-md mb-4">
                        <h4 class="text-xl font-bold text-gray-900">{{ $car['name'] }}</h4>
                        <p class="text-gray-600 mt-1">₱{{ number_format($car['price'], 2) }} / day</p>
                        <p class="text-gray-500">Seats: {{ $car['seats'] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>


<!-- Services Overview Section -->
<section class="py-12 mt-12">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-[#333333]">Services</h2>
            <a href="/services" class="text-[#333333] font-semibold hover:text-[#555555] transition flex items-center">
                View Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $services = [
                    ['title' => 'Self-Drive Rentals', 'icon' => 'car'],
                    ['title' => 'Chauffeur Services', 'icon' => 'user-tie'],
                    ['title' => 'Airport Transfers', 'icon' => 'plane-departure'],
                    ['title' => 'Long-Term Rentals', 'icon' => 'calendar-alt'],
                    ['title' => 'Corporate Rentals', 'icon' => 'briefcase'],
                    ['title' => 'Tour Packages', 'icon' => 'map-marked-alt']
                ];
            @endphp

            @foreach($services as $service)
            <a href="/services" class="block bg-white border border-gray-200 shadow-md p-6 rounded-xl text-center cursor-pointer transition-transform transform hover:-translate-y-2 hover:shadow-lg">
                <i class="fas fa-{{ $service['icon'] }} text-3xl text-gray-700"></i>
                <h3 class="text-xl font-semibold text-gray-900 mt-3">{{ $service['title'] }}</h3>
            </a>
            @endforeach
        </div>
    </div>
</section>


<!-- Features Section -->
<section class="flex flex-col justify-center items-center text-center py-12 mt-20 bg-[#222222] text-white">
    <h2 class="text-2xl font-bold mb-6">Why Choose FLEXIDRIVE?</h2>
    <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-5xl mx-auto text-sm">
        <div class="flex flex-col items-center">
            <img src="{{ asset('/keypoints/flexible.png') }}" alt="Flexibility Icon" class="h-10 mb-2" />
            <h3 class="font-semibold">Flexibility in Travel</h3>
            <p class="mt-1 text-center">Choose self-drive or chauffeur for a tailored journey.</p>
        </div>
        <div class="hidden md:block w-px bg-white h-16"></div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('/keypoints/affordable.png') }}" alt="Affordable Icon" class="h-10 mb-2" />
            <h3 class="font-semibold">Affordable Solutions</h3>
            <p class="mt-1 text-center">Budget-friendly travel for students and professionals.</p>
        </div>
        <div class="hidden md:block w-px bg-white h-16"></div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('/keypoints/ufriendly.png') }}" alt="User-Friendly Icon" class="h-10 mb-2" />
            <h3 class="font-semibold">User-Friendly Booking</h3>
            <p class="mt-1 text-center">Seamless booking for your convenience.</p>
        </div>
    </div>
</section>



@endsection