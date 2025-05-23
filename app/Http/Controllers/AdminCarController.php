<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use Illuminate\Support\Facades\File;

class AdminCarController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminViewAllCars()
    {
        // Get all car IDs that are currently rented (confirmed bookings)
        $rentedCarIds = Booking::where('status', 'confirmed')->pluck('car_id')->toArray();

        // Get all cars grouped by category
        $groupedCars = Car::all()->groupBy('category');

        // Get total car count per category
        $carCategoryCounts = Car::select('category', \DB::raw('count(*) as total'))
                                ->groupBy('category')
                                ->pluck('total', 'category')
                                ->toArray();

        return view('admin.cars', compact('groupedCars', 'carCategoryCounts', 'rentedCarIds'));
    }

    public function viewRentals()
    {
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

    //counts how many cars are in a category and shows the result in the page
    public function carCategorySummary()
    {
        // Get the number of cars in each category
        $subquery = Car::select('category', \DB::raw('COUNT(*) as total'))
            ->groupBy('category');

        //uses grouped result like a table
        $categories = \DB::table(\DB::raw("({$subquery->toSql()}) as sub"))
            ->mergeBindings($subquery->getQuery())
            ->select('sub.category', 'sub.total')
            ->get();
        
        //displays result   
        return view('admin.car_category_summary', compact('categories'));
    }

    public function updateRentalStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed',
        ]);

        $rental = Booking::findOrFail($id);

        $rental->status = $request->status;
        $rental->save();

        return redirect()->route('admin.rentals')->with('success', 'Booking status updated successfully.');
    }

}
