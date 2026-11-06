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
        $post1 = new Post;
        $post1 -> title = 'is the koenigsegg jesko the best car in the world?';
        $post1 -> description = 'opinions please';
        $post1 -> save();

        $post2 = new Post;
        $post2 -> title = 'what are your best supercars of 2026';
        $post2 -> description = 'supercar rankings?';
        $post2 -> save();

    Post::factory()->count(8)->create();

    }
}
