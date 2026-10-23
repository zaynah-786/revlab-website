<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

