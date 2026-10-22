<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $a = new Car;
        $a -> manufacturer = 'Koenigsegg';
        $a -> model = 'CCXR';
        $a -> year = 2007;
        $a -> horsepower = 1018;
        $a -> weight = 1380;
        $a -> save();

        $a = new Car;
        $a -> manufacturer = 'Lamborghini';
        $a -> model = 'Centenario (Coupé)';
        $a -> year = 2016;
        $a -> horsepower = 759;
        $a -> weight = 1675;
        $a -> save();

        $a = new Car;
        $a -> manufacturer = 'Ferrari';
        $a -> model = '360 Modena';
        $a -> year = 1999;
        $a -> horsepower = 400;
        $a -> weight = 1493;
        $a -> save();

    }
}
