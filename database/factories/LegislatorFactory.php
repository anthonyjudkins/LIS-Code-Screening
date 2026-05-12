<?php

namespace Database\Factories;

use App\Models\Legislator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Legislator>
 */
class LegislatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'hometown' => $this->faker->city,
        ];
    }
}
