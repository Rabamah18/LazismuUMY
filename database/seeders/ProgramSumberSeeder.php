<?php

namespace Database\Seeders;

use App\Models\ProgramSumber;
use Illuminate\Database\Seeder;

class ProgramSumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramSumber::factory()->count(3)->sequence(
            ['name' => 'Zakat Maal'],
            ['name' => 'Zakat Fitrah'],
            ['name' => 'Infaq']
        )->create();
    }
}
