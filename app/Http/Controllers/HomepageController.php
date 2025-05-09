<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
    $cars = [
        ['name' => 'Toyota Vios', 'category' => 'Sedan', 'price' => 2500, 'seats' => 5, 'image' => 'toyota_vios.jpg'],
        ['name' => 'Honda City', 'category' => 'Sedan', 'price' => 2600, 'seats' => 5, 'image' => 'honda_city.jpg'],
        ['name' => 'Isuzu MU-X', 'category' => 'SUV', 'price' => 5500, 'seats' => 7, 'image' => 'isuzu_mux.jpg'],
        ['name' => 'Ford Ranger', 'category' => 'Pickup', 'price' => 4000, 'seats' => 5, 'image' => 'ford_everest.jpg'],
        ['name' => 'BMW 5 Series', 'category' => 'Luxury', 'price' => 15000, 'seats' => 5, 'image' => 'bmw_5_series.jpg'],
        ['name' => 'Toyota Hiace', 'category' => 'Van', 'price' => 2400, 'seats' => 10, 'image' => 'toyota_hiace.jpg'],
    ];

    $groupedCars = collect($cars)->groupBy('category');

        return view('pages.homepage', compact('groupedCars'));
        
    }
}
