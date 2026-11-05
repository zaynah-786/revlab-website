<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Post;
        $a->title = 'is the koenigsegg jesko the best car in the world?';
        $a->description = 'opinions please';
        $a->save();

        $a = new Post;
        $a->title = 'what are your best supercars of 2026';
        $a->description = 'supercar rankings?';
        $a->save();

    Post::factory()->count(8)->create();

    }
}
