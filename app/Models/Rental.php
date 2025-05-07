<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    // Specify the table name if it's not the plural form of the model name
    protected $table = 'rentals'; // Use your actual table name

    // Define the fillable or guarded attributes for mass assignment
    protected $fillable = ['car_id', 'user_id', 'status', 'start_date', 'end_date'];
}

