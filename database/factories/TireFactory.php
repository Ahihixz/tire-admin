<?php

namespace Database\Factories;

use App\Models\Tire;
use Illuminate\Database\Eloquent\Factories\Factory;

class TireFactory extends Factory
{
    protected $model = Tire::class;

    public function definition(): array
    {
        return [
            'tire_code' => 'T' . $this->faker->unique()->numberBetween(100, 999),
            'brand' => $this->faker->randomElement(['Bridgestone', 'Michelin', 'Goodyear']),
            'size' => '275/80R22.5',
            'status' => 'ACTIVE',
            'running_km' => $this->faker->numberBetween(0, 50000),
            'running_hours' => $this->faker->numberBetween(0, 2000),
            'quantity' => 1,
            'location' => 'Warehouse',
        ];
    }
}
