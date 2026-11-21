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
        $postTag1 = Post::where('title', 'like', '%Koenigsegg Jesko%')->first();
        $tag1 = Tag::where('name', 'Koenigsegg')->first();
        if ($postTag1 && $tag1) {
            $postTag1->tags()->syncWithoutDetaching([$tag1->id]);
        }

        $postTag2 = Post::where('title', 'like', '%best supercars of 2026%')->first();
        $tag2 = Tag::where('name', 'Supercar')->first();
        if ($postTag2 && $tag2) {
            $postTag2->tags()->syncWithoutDetaching([$tag2->id]);
        }

        $tags = Tag::all();
        if ($tags->isNotEmpty()) {
            Post::all()->each(function ($post) use ($tags) {
                $post->tags()->syncWithoutDetaching(
                    $tags->random(min(rand(1, 3), $tags->count()))->pluck('id')
                );
            });
        }
    }
}