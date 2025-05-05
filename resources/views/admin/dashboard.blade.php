@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-xl p-6">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Admin Dashboard</h1>

            {{-- Elegant Navigation --}}
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

            <p class="text-gray-600">Use the links above to manage your car listings and customer rentals.</p>
        </div>
    </div>
@endsection
