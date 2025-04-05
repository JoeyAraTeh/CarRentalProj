<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
    $cars = [
        ['name' => 'Toyota Vios', 'category' => 'Sedan', 'price' => 2500, 'seats' => 5, 'image' => 'vios.jpg'],
        ['name' => 'Honda City', 'category' => 'Sedan', 'price' => 2600, 'seats' => 5, 'image' => 'honda.jpg'],
        ['name' => 'Toyota Hiace', 'category' => 'Sedan', 'price' => 4500, 'seats' => 10, 'image' => 'suzuki.jpg'],
        ['name' => 'Ford Ranger', 'category' => 'Pickup', 'price' => 4000, 'seats' => 5, 'image' => 'ford.jpg'],
        ['name' => 'Suzuki Ertiga', 'category' => 'MPV', 'price' => 3500, 'seats' => 7, 'image' => 'ertiga.jpg'],
        ['name' => 'Hyundai Accent', 'category' => 'Van', 'price' => 2400, 'seats' => 5, 'image' => 'accent.jpg'],
    ];

    $groupedCars = collect($cars)->groupBy('category');

        return view('pages.homepage', compact('groupedCars'));
        
    }
}
