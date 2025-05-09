<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['Toyota', 'Vios', 'Economy', 'Automatic', 2020, 2500.00, 5, 'toyota_vios.jpg'],
            ['Honda', 'City', 'Economy', 'Automatic', 2021, 2600.00, 5, 'honda_city.jpg'],
            ['Suzuki', 'Celerio', 'Economy', 'Manual', 2022, 2200.00, 5, 'suzuki_celerio.jpg'],
            ['Mitsubishi', 'Xpander', 'MPV', 'Automatic', 2021, 3500.00, 7, 'mitsubishi_xpander.jpg'],
            ['Toyota', 'Avanza', 'MPV', 'Automatic', 2020, 3300.00, 7, 'toyota_avanza.jpg'],
            ['Ford', 'Everest', 'SUV', 'Automatic', 2023, 4500.00, 7, 'ford_everest.jpg'],
            ['Toyota', 'Fortuner', 'SUV', 'Automatic', 2022, 4700.00, 7, 'toyota_fortuner.jpg'],
            ['Isuzu', 'MU-X', 'SUV', 'Automatic', 2022, 4600.00, 7, 'isuzu_mux.jpg'],
            ['Hyundai', 'Starex', 'Van', 'Manual', 2021, 5000.00, 10, 'hyundai_starex.jpg'],
            ['Nissan', 'Urvan', 'Van', 'Manual', 2023, 5500.00, 15, 'nissan_urvan.jpg'],
            ['Toyota', 'Hiace', 'Van', 'Automatic', 2023, 6000.00, 15, 'toyota_hiace.jpg'],
            ['Foton', 'Traveller XL', 'Van', 'Manual', 2022, 6200.00, 18, 'foton_traveller_xl.jpg'],
            ['Toyota', 'Hilux', 'Pickup Truck', 'Manual', 2021, 4800.00, 5, 'toyota_hilux.jpg'],
            ['Ford', 'Ranger', 'Pickup Truck', 'Automatic', 2023, 5200.00, 5, 'ford_ranger.jpg'],
            ['BMW', '5 Series', 'Luxury', 'Automatic', 2022, 12000.00, 5, 'bmw_5_series.jpg'],
            ['Mercedes-Benz', 'E-Class', 'Luxury', 'Automatic', 2023, 13000.00, 5, 'mercedes_e_class.jpg'],
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert([
                'brand' => $car[0],
                'model' => $car[1],
                'category' => $car[2],
                'type' => $car[3], // Using this for transmission
                'year' => $car[4],
                'rental_price_per_day' => $car[5],
                'seats' => $car[6],
                'description' => 'Comfortable and reliable ' . $car[0] . ' ' . $car[1] . '.', // Placeholder
                'image' => $car[7],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
