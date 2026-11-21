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
        $post1 -> title = ' Is the Koenigsegg Jesko the greatest internal combustion car ever built?';
        $post1 -> description = 'Between the 1,600 hp twin-turbo V8 on E85, the zero-flywheel throttle response, and that insane 9-speed Light Speed Transmission, it feels like Christian von Koenigsegg basically solved pure combustion engineering before everything goes hybrid or electric. Whether you look at the downforce on the Attack or the theoretical top speed of the Absolut, nothing else really comes close on paper.
        For those who have seen them up close or tracked them, does the driving experience actually live up to the crazy engineering specs? If money were no object, are you taking a Jesko over a Pagani Utopia, an Aston Martin Valkyrie, or a Bugatti Tourbillon?';
        $post1 -> save();

        $post2 = new Post;
        $post2 -> user_id = $userId;
        $post2 -> title = 'End of year debate: What are your best supercars of 2026?';
        $post2 -> description = 'With 2026 wrapping up, it feels like we’ve had one of the wildest years ever for performance cars—from the 1,000+ bhp hybrid monsters like the Aston Martin Valhalla and Lamborghini Revuelto to pure driver\'s machines like the Ferrari 296 Speciale and 12Cilindri. Personally, the McLaren 750S and the updated Porsche 911 Turbo S still feel like the ultimate real-world benchmarks, even with all the crazy new hybrid tech flooding the market.
        If you had to crown a single winner for 2026, which car takes the top spot for you and why? Are you leaning toward the new-school hybrid rocketships, or are the remaining naturally aspirated V12s still the only things that truly matter?';
        $post2 -> save();

        $post3 = new Post;
        $post3 -> user_id = $userId;
        $post3 -> title = 'Have modern hypercars gotten too heavy to actually enjoy?';
        $post3 -> description = 'Looking at the latest releases like the Tourbillon and W1, it feels like chasing 1,800+ horsepower with massive hybrid batteries has ruined the pure driving feel. Personally, I’d take a lightweight, naturally aspirated V12 under 1,200 kg over a heavy hybrid spaceship any day.
        At what point does extra horsepower become totally unusable on real roads? If you had £3M to spend right now, are you buying a new hybrid hypercar or hunting down a clean 2010s icon like a P1 or LaFerrari?';
        $post3 -> save();

        $post4 = new Post;
        $post4 -> user_id = $userId;
        $post4 -> title = 'Honest question for actual owners: What are your real annual running costs?';
        $post4 -> description = 'Everyone loves talking about auction prices and build slots, but nobody ever shares what it actually costs to keep these cars on the road once the factory service plan expires. I\'m seriously considering picking up an early Huayra or an Aventador SVJ, and I want to know what the real yearly burn rate looks like before pulling the trigger.
        For those of you who actually drive your cars instead of keeping them in a bubble, what’s the most absurd routine maintenance bill you\'ve been hit with so far? Also, are good independent specialists able to handle most of the work, or are you stuck waiting months for factory techs to fly out?';
        $post4 -> save();


    }
}