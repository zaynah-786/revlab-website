<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    //
    /** @use HasFactory<TagFactory> */
    use HasFactory;


    public function posts()
    {
        return $this->belongsToMany(\App\Models\Post::class);
    }

}
