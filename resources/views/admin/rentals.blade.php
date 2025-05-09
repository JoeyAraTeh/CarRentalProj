@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">All Rentals</h2>
        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Go to Admin Dashboard
        </a>
    </div>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Rental ID</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Car</th>
                <th class="px-4 py-2">Pickup Date</th>
                <th class="px-4 py-2">Dropoff Date</th>
                <th class="px-4 py-2">Service</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rentals as $rental)
        <tr class="border-t
            @if($rental->status == 'pending') status-pending
            @elseif($rental->status == 'confirmed') status-confirmed
            @elseif($rental->status == 'completed') status-completed
            @elseif($rental->status == 'cancelled') status-cancelled
            @endif
        ">
            <td class="px-4 py-2">{{ $rental->id }}</td>
            <td class="px-4 py-2">{{ $rental->user->email ?? $rental->email ?? 'N/A' }}</td>
            <td class="px-4 py-2">{{ $rental->car->brand ?? 'Unknown' }} {{ $rental->car->model ?? '' }}</td>
            <td class="px-4 py-2">{{ $rental->pickup_date }}</td>
            <td class="px-4 py-2">{{ $rental->dropoff_date }}</td>
            <td class="px-4 py-2">{{ $rental->service }}</td>
            <td class="px-4 py-2">
                <form action="{{ route('admin.updateRentalStatus', $rental->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()">
                        <option value="pending" {{ $rental->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $rental->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
