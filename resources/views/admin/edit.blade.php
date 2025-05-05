@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Car</h1>

    <form action="{{ route('admin.edit', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
            <input type="text" name="brand" id="brand" class="mt-1 block w-full" value="{{ $car->brand }}" required>
        </div>

        <div class="mb-4">
            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
            <input type="text" name="model" id="model" class="mt-1 block w-full" value="{{ $car->model }}" required>
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input type="number" name="year" id="year" class="mt-1 block w-full" value="{{ $car->year }}" required>
        </div>

        <div class="mb-4">
            <label for="rental_price_per_day" class="block text-sm font-medium text-gray-700">Rental Price per Day</label>
            <input type="number" name="rental_price_per_day" id="rental_price_per_day" class="mt-1 block w-full" value="{{ $car->rental_price_per_day }}" required>
        </div>

        <div class="mb-4">
            <label for="seats" class="block text-sm font-medium text-gray-700">Seats</label>
            <input type="number" name="seats" id="seats" class="mt-1 block w-full" value="{{ $car->seats }}" required>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" name="category" id="category" class="mt-1 block w-full" value="{{ $car->category }}" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
            @if($car->image)
                <img src="{{ asset('storage/images/' . $car->image) }}" class="mt-2" alt="Car Image" width="100">
            @endif
        </div>

       