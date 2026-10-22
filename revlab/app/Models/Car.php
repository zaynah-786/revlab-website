<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    //
    /** @use HasFactory<CarFactory> */
    use HasFactory;
}
