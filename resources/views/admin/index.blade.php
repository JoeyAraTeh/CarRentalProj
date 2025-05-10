@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">All Cars (Admin View)</h1>

    <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Car</a>

    <!-- organizes car by category -->
    @foreach($cars as $category => $group)
        <h2 class="text-xl font-semibold mt-6 mb-2">{{ $category }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- displays details of each car with options to manage them -->
            @foreach($group as $car)
                <div class="border p-4 rounded shadow">
                    <img src="{{ asset('images/' . $car->image) }}" class="h-40 w-full object-cover mb-2" alt="{{ $car->brand }}">
                    <h3 class="text-lg font-bold">{{ $car->brand }} {{ $car->model }}</h3>
                    <p>₱{{ $car->rental_price_per_day }} per day</p>
                    <p>Seats: {{ $car->seats }}</p>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Delete this car?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded mt-2">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
