<?php

namespace Database\Seeders;

use App\Models\Pilar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PilarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pilar::factory()->count(6)->sequence(
            ['name' => 'Pendidikan'],
            ['name' => 'Kesehatan'],
            ['name' => 'Ekonomi'],
            ['name' => 'Kemanusian'],
            ['name' => 'Sosial Dakwah'],
            ['name' => 'Linkungan']
        )->create();
    }
}
