<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::factory()->create();

        $profile = new Profile;
        $profile -> name = 'User Profile 1';
        $profile -> email = 'testuser@revlab.com';
        $profile -> phone_number = '123-456-7890';
        $profile->user_id = $user->id;
        $profile -> save();

        Profile::factory(50)->create();

    }
}
