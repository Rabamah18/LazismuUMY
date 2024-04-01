<?php

namespace Database\Factories;

use App\Models\Ashnaf;
use App\Models\PenerimaManfaat;
use App\Models\Pilar;
use App\Models\Tahun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penyaluran>
 */
class PenyaluranFactory extends Factory
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
            'nominal' => fake()->randomNumber(5, true),
            'penerima_manfaat_id' => PenerimaManfaat::factory(),
            'ashnaf_id' => Ashnaf::factory(),
            'pilar_id' => Pilar::factory(),
            'tahun_id' => Tahun::factory(),
        ];
    }
}
