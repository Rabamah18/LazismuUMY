<?php

namespace Database\Seeders;

use App\Models\SumberDonasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SumberDonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SumberDonasi::factory()->count(3)->sequence(
            ['name' => 'Zakat'],
            ['name' => 'Infaq'],
            ['name' => 'Amil'],
        )->create();
    }
}
