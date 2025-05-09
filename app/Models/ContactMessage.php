<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
   // In ContactMessage.php
    protected $fillable = ['name', 'email', 'message'];

}
