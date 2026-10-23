<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    // todo add UseHasFactory trait to the Profile model

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

