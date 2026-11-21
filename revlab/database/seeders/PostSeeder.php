<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::first()->id;

        $post1 = new Post;
        $post1 -> user_id = $userId;
        $post1 -> title = 'Is the Koenigsegg Jesko the best car in the world?';
        $post1 -> description = 'opinions please';
        $post1 -> save();

        $post2 = new Post;
        $post2 -> user_id = $userId;
        $post2 -> title = 'What are your best supercars of 2026?';
        $post2 -> description = 'supercar rankings?';
        $post2 -> save();

        Post::factory(8)->hasAttached(Tag::factory(3))->create(['user_id' => $userId]);

    }
}