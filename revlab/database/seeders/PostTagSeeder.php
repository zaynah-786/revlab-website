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
        $a = Post::where('title', 'is the koenigseggjesko the best car in the world?')->first();
        $a->tags()->attach(
            Tag::where('name', 'koenigsegg')->first()->id
        );

        $a = Post::where('title', 'what are you best supercars of 2026')->first();
        $a->tags()->attach(
            Tag::where('name', 'supercar')->first()->id
        );
    }
    }

