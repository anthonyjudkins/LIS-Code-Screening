<?php

namespace Database\Factories;

use App\Models\Legislation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Legislation>
 */
class LegislationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
        ];
    }
}
