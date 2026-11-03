<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
        public function carModels()
    {
        return $this->hasMany(\App\Models\CarModel::class);
    }
}
