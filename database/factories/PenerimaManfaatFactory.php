<?php

namespace Database\Factories;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenerimaManfaat>
 */
class PenerimaManfaatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lembaga_count' => fake()->numerify(),
            'male_count' => fake()->numerify(),
            'female_count' => fake()->numerify(),
        ];
    }
}
