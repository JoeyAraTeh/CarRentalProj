@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-xl p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Admin Dashboard</h1>

        {{-- Navigation --}}
        <nav class="mb-6">
            <ul class="flex flex-col sm:flex-row gap-4">
                <li>
                    <a href="{{ route('admin.cars') }}"
                       class="block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm">
                        🚗 Manage Cars
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rentals') }}"
                       class="block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 shadow-sm">
                        📄 View Rentals
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Overview Section --}}
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Car Rental Overview</h2>

            {{-- Chart + Stats Flex Container --}}
            <div class="flex flex-col lg:flex-row items-start gap-6">
                {{-- Horizontal Bar Chart --}}
                <div class="w-full lg:w-[70%]">
                    <div class="h-[300px] w-full">
                        <canvas id="rentalBarChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                {{-- Vertical Stack of Boxes --}}
                <div class="w-full lg:w-1/4 flex flex-col space-y-4 mt-3">
                    <div class="bg-green-200 p-4 rounded-lg shadow-md text-center">
                        <h2 class="text-sm font-semibold">Rented Cars</h2>
                        <p class="text-2xl text-gray-700">{{ $rentedCars }}</p>
                    </div>
                    <div class="bg-blue-200 p-4 rounded-lg shadow-md text-center">
                        <h2 class="text-sm font-semibold">Completed Rentals</h2>
                        <p class="text-2xl text-gray-700">{{ $completedRentals }}</p>
                    </div>
                    <div class="bg-gray-300 p-4 rounded-lg shadow-md text-center">
                        <h2 class="text-sm font-semibold">Available Cars</h2>  <!-- Changed from Total Cars to Available Cars -->
                        <p class="text-2xl text-gray-700">{{ $availableCars }}</p>  <!-- Replace with availableCars -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('rentalBarChart').getContext('2d');
    const rentalBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rented Cars', 'Completed Rentals', 'Available Cars'],
            datasets: [{
                label: 'Number of Cars / Rentals',
                data: [{{ (int)$rentedCars }}, {{ (int)$completedRentals }}, {{ (int)$availableCars }}],  <!-- Updated data -->
                backgroundColor: [
                    'rgba(144, 238, 144, 0.7)',  // Light green for Rented Cars
                    'rgba(173, 216, 230, 0.7)',  // Light blue for Completed Rentals
                    'rgba(169, 169, 169, 0.7)'   // Gray for Available Cars
                ],
                borderColor: [
                    'rgba(144, 238, 144, 1)',
                    'rgba(173, 216, 230, 1)',
                    'rgba(169, 169, 169, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',  // Horizontal bar chart
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        }
    });
</script>

@endsection
