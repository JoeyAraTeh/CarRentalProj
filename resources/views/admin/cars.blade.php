@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">All Cars (Admin View)</h1>

    @foreach($groupedCars as $category => $cars)
        <h2 class="text-xl font-semibold mt-6 mb-2">
            {{ $category }} 
            <span class="text-sm text-gray-600">({{ $carCategoryCounts[$category] ?? 0 }} cars)</span> <!-- Display the total cars in the category -->
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($cars as $car)
                <div class="border p-4 rounded shadow">
                    <img src="{{ asset('images/cars/' . $car->image) }}" class="h-40 w-full object-cover mb-2" alt="{{ $car->name }}">
                    <h3 class="text-lg font-bold">{{ $car->brand }} {{ $car->model }}</h3>
                    <p><strong>Category:</strong> {{ $car->category }}</p>
                    <p><strong>Year:</strong> {{ $car->year }}</p>
                    <p><strong>Price:</strong> ₱{{ number_format($car->rental_price_per_day, 2) }} per day</p>
                    <p><strong>Seats:</strong> {{ $car->seats }}</p>
                    <p><strong>Type:</strong> {{ $car->type }}</p>

                    <!-- Add buttons for Edit or Delete -->
                    <div class="mt-2">
                        <a href="{{ route('admin.edit', $car->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
