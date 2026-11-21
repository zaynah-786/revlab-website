<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;


class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postTag1 = Post::where('title', 'Is the Koenigsegg Jesko the best car in the world?')->first();
        $postTag1 -> tags()->attach(
            Tag::where('name', 'Koenigsegg')->first()->id
        );

        $postTag2 = Post::where('title', 'What are your best supercars of 2026?')->first();
        $postTag2 -> tags()->attach(
            Tag::where('name', 'Supercar')->first()->id
        );

        $tags = Tag::all(); 
        Post::all()->each(function ($post) use ($tags) 
        { $post->tags()->syncWithoutDetaching( 
            $tags->random(rand(1, 3))->pluck('id')); 
        });
    }
    }

