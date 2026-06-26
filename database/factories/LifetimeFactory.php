<?php

namespace Database\Factories;

use App\Models\Lifetime;
use App\Models\Tire;
use Illuminate\Database\Eloquent\Factories\Factory;

class LifetimeFactory extends Factory
{
    protected $model = Lifetime::class;

    public function definition(): array
    {
        return [
            'tire_id' => Tire::factory(),
            'hm_install' => $this->faker->numberBetween(0, 5000),
            'hm_current' => $this->faker->numberBetween(1000, 8000),
            'km_install' => $this->faker->numberBetween(0, 50000),
            'km_current' => $this->faker->numberBetween(10000, 100000),
            'max_lifetime_hm' => 10000,
            'max_lifetime_km' => 300000,
            'average_hm_per_day' => 5,
            'status' => 'GOOD',
            'estimated_scrap_date' => null,
            'notes' => $this->faker->sentence(),
        ];
    }
}
