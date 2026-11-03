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
        $a = new Tag;
        $a->name = 'koenigsegg';
        $a->save();

        $a = new Tag;
        $a->name = 'supercar';
        $a->save();

        Tag::factory()->count(8)->create();
    }
}
