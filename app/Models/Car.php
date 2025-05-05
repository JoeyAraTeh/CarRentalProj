<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'type',
        'year',
        'rental_price_per_day',
        'description',
        'image',
        'category',
        'seats',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
