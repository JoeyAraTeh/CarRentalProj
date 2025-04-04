<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display the car listings grouped by category
    public function index()
    {
        $cars = [
            // Economy
            ['name' => 'Toyota Vios', 'price' => 2500, 'seats' => 5, 'category' => 'Economy', 'image' => 'vios.jpg'],
            ['name' => 'Honda City', 'price' => 2600, 'seats' => 5, 'category' => 'Economy','image' => 'honda.jpg'],
            ['name' => 'Suzuki Celerio', 'price' => 2200, 'seats' => 5, 'category' => 'Economy','image' => 'suzuki.jpg'],

            // MPV
            ['name' => 'Mitsubishi Xpander', 'price' => 3500, 'seats' => 7, 'category' => 'MPV','image' => 'mitsubishi.jpg'],
            ['name' => 'Toyota Avanza', 'price' => 3300, 'seats' => 7, 'category' => 'MPV','image' => 'vios.jpg'],

            // SUV
            ['name' => 'Ford Everest', 'price' => 4500, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],
            ['name' => 'Toyota Fortuner', 'price' => 4700, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],
            ['name' => 'Isuzu MU-X', 'price' => 4600, 'seats' => 7, 'category' => 'SUV','image' => 'vios.jpg'],

            // Van
            ['name' => 'Hyundai Starex', 'price' => 5000, 'seats' => 10, 'category' => 'Van','image' => 'vios.jpg'],
            ['name' => 'Nissan Urvan', 'price' => 5500, 'seats' => 15, 'category' => 'Van','image' => 'vios.jpg'],
            ['name' => 'Toyota Hiace', 'price' => 6000, 'seats' => 15, 'category' => 'Van','image' => 'vios.jpg'],
            ['name' => 'Foton Traveller XL', 'price' => 6200, 'seats' => 18, 'category' => 'Van','image' => 'vios.jpg'],

            // Pickup Truck
            ['name' => 'Toyota Hilux', 'price' => 4800, 'seats' => 5, 'category' => 'Pickup Truck','image' => 'vios.jpg'],
            ['name' => 'Ford Ranger Raptor', 'price' => 5200, 'seats' => 5, 'category' => 'Pickup Truck','image' => 'vios.jpg'],

            // Luxury
            ['name' => 'BMW 5 Series', 'price' => 12000, 'seats' => 5, 'category' => 'Luxury','image' => 'vios.jpg'],
            ['name' => 'Mercedes-Benz E-Class', 'price' => 13000, 'seats' => 5, 'category' => 'Luxury','image' => 'vios.jpg'],
        ];

        $groupedCars = collect($cars)->groupBy('category');

        return view('car', compact('groupedCars'));
    }

    // Show the booking form for a specific car
    public function showBookingForm($id)
    {
        // In a real application, retrieve car details from the database
        $car = $this->getCarById($id);

        return view('book', compact('car'));
    }


    private function getCarById($id)
    {
        $cars = [
            ['id' => 0, 'name' => 'Toyota Vios', 'price' => 2500, 'seats' => 5, 'category' => 'Economy', 'image' => 'vios.jpg'],
            ['id' => 1, 'name' => 'Honda City', 'price' => 2600, 'seats' => 5, 'category' => 'Economy', 'image' => 'honda.jpg'],
            ['id' => 2, 'name' => 'Suzuki Celerio', 'price' => 2200, 'seats' => 5, 'category' => 'Economy', 'image' => 'suzuki.jpg'],
            ['id' => 3, 'name' => 'Mitsubishi Xpander', 'price' => 3500, 'seats' => 7, 'category' => 'MPV', 'image' => 'mitsubishi.jpg'],
            ['id' => 4, 'name' => 'Toyota Avanza', 'price' => 3300, 'seats' => 7, 'category' => 'MPV', 'image' => 'vios.jpg'],
            ['id' => 5, 'name' => 'Ford Everest', 'price' => 4500, 'seats' => 7, 'category' => 'SUV', 'image' => 'vios.jpg'],
            ['id' => 6, 'name' => 'Toyota Fortuner', 'price' => 4700, 'seats' => 7, 'category' => 'SUV', 'image' => 'vios.jpg'],
            ['id' => 7, 'name' => 'Isuzu MU-X', 'price' => 4600, 'seats' => 7, 'category' => 'SUV', 'image' => 'vios.jpg'],
            ['id' => 8, 'name' => 'Hyundai Starex', 'price' => 5000, 'seats' => 10, 'category' => 'Van', 'image' => 'vios.jpg'],
            ['id' => 9, 'name' => 'Nissan Urvan', 'price' => 5500, 'seats' => 15, 'category' => 'Van', 'image' => 'vios.jpg'],
            ['id' => 10, 'name' => 'Toyota Hiace', 'price' => 6000, 'seats' => 15, 'category' => 'Van', 'image' => 'vios.jpg'],
            ['id' => 11, 'name' => 'Foton Traveller XL', 'price' => 6200, 'seats' => 18, 'category' => 'Van', 'image' => 'vios.jpg'],
            ['id' => 12, 'name' => 'Toyota Hilux', 'price' => 4800, 'seats' => 5, 'category' => 'Pickup Truck', 'image' => 'vios.jpg'],
            ['id' => 13, 'name' => 'Ford Ranger Raptor', 'price' => 5200, 'seats' => 5, 'category' => 'Pickup Truck', 'image' => 'vios.jpg'],
            ['id' => 14, 'name' => 'BMW 5 Series', 'price' => 12000, 'seats' => 5, 'category' => 'Luxury', 'image' => 'vios.jpg'],
            ['id' => 15, 'name' => 'Mercedes-Benz E-Class', 'price' => 13000, 'seats' => 5, 'category' => 'Luxury', 'image' => 'vios.jpg'],
        ];
    
        return collect($cars)->firstWhere('id', $id);
    }
    

}
