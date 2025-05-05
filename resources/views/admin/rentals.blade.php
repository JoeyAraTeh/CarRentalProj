@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">All Rentals</h2>
    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Rental ID</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Car</th>
                <th class="px-4 py-2">Pickup Date</th>
                <th class="px-4 py-2">Dropoff Date</th>
                <th class="px-4 py-2">Service</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $rental->id }}</td>
                <td class="px-4 py-2">
                    {{ $rental->user->name ?? 'N/A' }}
                </td>
                <td class="px-4 py-2">
                    {{ $rental->car->brand ?? 'Unknown' }} {{ $rental->car->model ?? '' }}
                </td>
                <td class="px-4 py-2">{{ $rental->pickup_date }}</td>
                <td class="px-4 py-2">{{ $rental->dropoff_date }}</td>
                <td class="px-4 py-2">{{ $rental->service }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
