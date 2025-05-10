@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Car Category Summary</h2>
    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Total Cars</th>
            </tr>
        </thead>
        <tbody>
            <!-- loops through the $categories data passed from the controller -->
            <!-- creates new row for each categorys w/ name and total cars -->
            @foreach($categories as $category)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $category->category }}</td>
                    <td class="px-4 py-2">{{ $category->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
