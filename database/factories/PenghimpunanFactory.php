<?php

namespace Database\Factories;

use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penghimpunan>
 */
class PenghimpunanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => fake()->dateTime(),
            'uraian' => fake()->word(),
            'nominal' => fake()->randomDigit(),
            'sumber_dana_id' => SumberDana::factory(),
            'program_sumber_id' => ProgramSumber::factory(),
            'tahun_id' => Tahun::factory(),
        ];
    }
}
