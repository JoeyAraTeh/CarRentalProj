@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="bg-white shadow-2xl rounded-3xl p-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>

        {{-- Navigation --}}
        <nav class="mb-10">
            <ul class="flex flex-wrap gap-4">
                <li>
                    <a href="{{ route('admin.cars') }}"
                       class="inline-block px-5 py-3 bg-[#333333] text-white text-base font-medium rounded-lg hover:bg-[#1f1f1f] transition-all duration-200 shadow">
                        Manage Cars
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rentals') }}"
                       class="inline-block px-5 py-3 bg-[#706C61] text-white text-base font-medium rounded-lg hover:bg-[#5a574f] transition-all duration-200 shadow">
                        View Rentals
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Overview Section --}}
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Car Rental Overview</h2>

            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Chart --}}
                <div class="w-full lg:w-2/3 bg-gray-50 p-6 rounded-2xl shadow-inner">
                    <div class="h-[320px] w-full">
                        <canvas id="rentalBarChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="w-full lg:w-1/3 flex flex-col gap-5">
                    <div class="bg-[#e0e3e3] p-6 rounded-xl shadow text-center">
                        <h3 class="text-sm font-medium text-[#333333] uppercase tracking-wide">Rented Cars</h3>
                        <p class="text-3xl font-semibold text-[#333333] mt-2">{{ $rentedCars }}</p>
                    </div>
                    <div class="bg-[#e0e3e3] p-6 rounded-xl shadow text-center">
                        <h3 class="text-sm font-medium text-[#333333] uppercase tracking-wide">Completed Rentals</h3>
                        <p class="text-3xl font-semibold text-[#333333] mt-2">{{ $completedRentals }}</p>
                    </div>
                    <div class="bg-[#e0e3e3] p-6 rounded-xl shadow text-center">
                        <h3 class="text-sm font-medium text-[#333333] uppercase tracking-wide">Available Cars</h3>
                        <p class="text-3xl font-semibold text-[#333333] mt-2">{{ $availableCars }}</p>
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
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rented Cars', 'Completed Rentals', 'Available Cars'],
            datasets: [{
                label: 'Total Count',
                data: [{{ (int)$rentedCars }}, {{ (int)$completedRentals }}, {{ (int)$availableCars }}],
                backgroundColor: [
                    'rgba(110, 231, 183, 0.7)',
                    'rgba(147, 197, 253, 0.7)',
                    'rgba(209, 213, 219, 0.7)'
                ],
                borderColor: [
                    'rgba(0, 0, 0, 0.3)',
                    'rgba(0, 0, 0, 0.3)',
                    'rgba(0, 0, 0, 0.3)'
                ],

                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    grid: { color: '#e5e7eb' }
                },
                y: {
                    ticks: { beginAtZero: true },
                    grid: { color: '#f3f4f6' }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
