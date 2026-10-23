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

        $a = new Profile;
        $a -> name = 'User Profile 1';
        $a -> email = 'testuser@revlab.com';
        $a -> phone_number = '123-456-7890';
        $a->user_id = $user->id;
        $a -> save();

        Profile::factory(50)->create();

    }
}
