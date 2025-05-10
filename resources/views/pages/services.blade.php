@extends('layouts.app')

@section('content')
<div class="relative bg-white min-h-screen py-16 px-6">
    <div class="text-center mb-12 mt-10">
        <h1 class="text-5xl font-extrabold text-gray-900 tracking-wide">Our Services</h1>
        <p class="text-gray-600 mt-3 text-lg">Experience comfort, luxury, and efficiency in every ride.</p>
    </div>

    <!-- Service Cards -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @php
            $services = [
                ['title' => 'Self-Drive Rentals', 'desc' => 'Drive at your own pace with our premium cars.', 'icon' => 'car'],
                ['title' => 'Chauffeur Services', 'desc' => 'Luxury rides with professional drivers.', 'icon' => 'user-tie'],
                ['title' => 'Airport Transfers', 'desc' => 'Seamless pick-up & drop-off services.', 'icon' => 'plane-departure'],
                ['title' => 'Long-Term Rentals', 'desc' => 'Exclusive plans for extended stays.', 'icon' => 'calendar-alt'],
                ['title' => 'Corporate Rentals', 'desc' => 'Business-class solutions for executives.', 'icon' => 'briefcase'],
                ['title' => 'Tour Packages', 'desc' => 'Explore destinations in style.', 'icon' => 'map-marked-alt']
            ];
        @endphp

        <!-- creates box for every services -->
        @foreach($services as $service)
        <div class="relative bg-white border border-gray-200 shadow-md p-8 rounded-xl transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-lg">
            <div class="flex items-center justify-center w-16 h-16 bg-gray-100 text-gray-800 rounded-full mx-auto shadow-sm">
                <i class="fas fa-{{ $service['icon'] }} text-3xl"></i>
            </div>
            <h2 class="text-2xl font-semibold text-gray-900 mt-6 text-center">{{ $service['title'] }}</h2>
            <p class="text-gray-600 text-center mt-3 leading-relaxed">{{ $service['desc'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
