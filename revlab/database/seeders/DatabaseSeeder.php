<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $a = new User;
        $a -> name = 'Admin';
        $a -> email = 'admin1@revlab.com';
        $a -> password = 'password';
        $a -> email_verified_at = now();
        $a -> remember_token = \Str::random(10);
        $a -> save();

        $a = new User;
        $a -> name = 'Zaynah Alam 1';
        $a -> email = 'zaynah1@revlab.com';
        $a -> password = 'password123';
        $a -> email_verified_at = now();
        $a -> remember_token = \Str::random(10);
        $a -> save();
    
        User::factory(50)->create();

    }
}
