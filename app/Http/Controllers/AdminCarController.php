<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking; // Add this line
use Illuminate\Support\Facades\File;

class AdminCarController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminViewAllCars()
    {
        // Get all cars from the database and group them by category
        $groupedCars = Car::all()->groupBy('category');
    
        // Get the total number of cars per category
        $carCategoryCounts = Car::select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();
    
        // Pass the grouped cars and counts to the view
        return view('admin.cars', compact('groupedCars', 'carCategoryCounts'));
    }

    public function viewRentals()
    {
        // Fetch real booking data from the database with car and user (optional) relationships
        $rentals = Booking::with(['car', 'user'])->latest()->get();

        return view('admin.rentals', compact('rentals'));
    }

  

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'year' => 'required|integer',
            'rental_price_per_day' => 'required|numeric',
            'seats' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'type' => $request->type,
            'year' => $request->year,
            'rental_price_per_day' => $request->rental_price_per_day,
            'seats' => $request->seats,
            'category' => $request->category,
            'image' => $imagePath ? basename($imagePath) : null,
        ]);

        return redirect()->route('admin.cars')->with('success', 'Car added successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image && File::exists(storage_path('app/public/images/' . $car->image))) {
            unlink(storage_path('app/public/images/' . $car->image));
        }

        $car->delete();

        return redirect()->route('admin.cars')->with('success', 'Car deleted successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.edit', compact('car'));
    }
    public function carCategorySummary()
{
    // Get the count of cars per category
    $categories = Car::select('category', \DB::raw('count(*) as total'))
        ->groupBy('category')
        ->get();

    // Pass the data to the view
    return view('admin.car_category_summary', compact('categories'));
}

}
