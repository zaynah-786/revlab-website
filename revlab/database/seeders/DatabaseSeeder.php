<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
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

        $user1 = new User;
        $user1 -> name = 'revlabadmin';
        $user1 -> email = 'admin1@revlab.com';
        $user1 -> password = 'password';
        $user1 -> role = 'admin';
        $user1 -> email_verified_at = now();
        $user1 -> remember_token = \Str::random(10);
        $user1 -> save();

        $user2 = new User;
        $user2 -> name = 'zaynahrevlab';
        $user2 -> email = 'zaynah1@revlab.com';
        $user2 -> password = 'password123';
        $user2 -> role = 'user';
        $user2 -> email_verified_at = now();
        $user2 -> remember_token = \Str::random(10);
        $user2 -> save();
    
        User::factory(50)->has(Profile::factory())->create();

    $this->call(ProfileSeeder::class);
    $this->call(TagSeeder::class);
    $this->call(PostSeeder::class);
    $this->call(PostTagSeeder::class);
    $this->call(CarCsvSeeder::class);
    }
}