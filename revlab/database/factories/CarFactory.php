<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'manufacturer' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->numberBetween(1966, 2026),
            'horsepower' => $this->faker->numberBetween(550, 5000),
            'weight' => $this->faker->numberBetween(980, 2000),
        ];
    }
}
