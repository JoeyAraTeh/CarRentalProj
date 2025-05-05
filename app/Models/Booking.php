<?php

namespace App\Models;

use App\Models\User; // Add at the top
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define which fields are mass-assignable
    protected $fillable = [
        'car_id', 'pickup_location', 'dropoff_location', 'pickup_date',
        'dropoff_date', 'pickup_time', 'dropoff_time', 'service'
    ];

    // Define the relationship to the Car model
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}

