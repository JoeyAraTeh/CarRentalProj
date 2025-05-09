@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Car Inventory (Admin)</h1>

    @foreach($groupedCars as $category => $cars)
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            {{ $category }}
            <span class="text-sm text-gray-500">({{ $carCategoryCounts[$category] ?? 0 }} cars)</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($cars as $car)
                @php $isRented = in_array($car->id, $rentedCarIds); @endphp

                <div class="relative bg-white rounded-2xl shadow-md overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    @if($isRented)
                        <div class="absolute inset-0 bg-black bg-opacity-60 z-20 flex items-center justify-center">
                            <span class="text-white text-2xl font-semibold">Not Available</span>
                        </div>
                    @endif

                    <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover rounded-t-2xl">
                    
                    <div class="p-5 space-y-2 relative z-10">
                        <h3 class="text-xl font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</h3>
                        <p class="text-gray-600"><span class="font-semibold">Category:</span> {{ $car->category }}</p>
                        <p class="text-gray-600"><span class="font-semibold">Year:</span> {{ $car->year }}</p>
                        <p class="text-gray-600"><span class="font-semibold">Type:</span> {{ $car->type }}</p>
                        <p class="text-gray-800 font-semibold">₱{{ number_format($car->rental_price_per_day, 2) }} / day</p>
                        <p class="text-gray-600"><span class="font-semibold">Seats:</span> {{ $car->seats }}</p>

                        <div class="pt-3 flex justify-between items-center">
                            <a href="{{ route('admin.edit', $car->id) }}" class="text-indigo-600 hover:underline font-medium">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline font-medium">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
