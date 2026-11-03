<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    //
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

}
