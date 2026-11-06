<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag1 = new Tag;
        $tag1 -> name = 'koenigsegg';
        $tag1 -> save();

        $tag2 = new Tag;
        $tag2 -> name = 'supercar';
        $tag2 -> save();

        Tag::factory()->count(8)->create();
    }
}
