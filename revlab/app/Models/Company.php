<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    // 

    /** @use HasFactory<CompanyFactory> */
    use HasFactory;

        public function carModels()
    {
        return $this->hasMany(\App\Models\CarModel::class);
    }
}
