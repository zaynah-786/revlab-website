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
        //
        $postTag1 = Post::where('title', 'is the koenigsegg jesko the best car in the world?')->first();
        $postTag1 -> tags()->attach(
            Tag::where('name', 'koenigsegg')->first()->id
        );

        $postTag2 = Post::where('title', 'what are your best supercars of 2026')->first();
        $postTag2 -> tags()->attach(
            Tag::where('name', 'supercar')->first()->id
        );
    }
    }

