<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;
use App\Models\PenerimaManfaat;
use App\Models\Penghimpunan;
use App\Models\Penyaluran;
use App\Models\Pilar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        Lokasi::factory(10)->create();
        Pilar::factory(10)->create();
        PenerimaManfaat::factory(10)->create();
        Penghimpunan::factory(10)->create();
        Penyaluran::factory(10)->create();
    }
}
