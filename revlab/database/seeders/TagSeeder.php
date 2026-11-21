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
        Tag::firstOrCreate(['name' => 'Koenigsegg']);
        Tag::firstOrCreate(['name' => 'Supercars']);

        Tag::factory()->count(50)->create();
    }
}