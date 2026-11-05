<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CarModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends Model
{
    //
    /** @use HasFactory<CarModelFactory> */
    use HasFactory;

        public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
