<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Donatur;
use App\Models\Lokasi;
use App\Models\PenerimaManfaat;
use App\Models\Penghimpunan;
use App\Models\Penyaluran;
use App\Models\ProgramPilar;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $this->call(PilarSeeder::class);
        $this->call(ProgramSumberSeeder::class);
        $this->call(AshnafSeeder::class);
        $this->call(SumberDanaSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(TahunSeeder::class);

        ProgramPilar::factory(10)->create();
        PenerimaManfaat::factory(10)->create();
        Penghimpunan::factory(100)->create();
        Penyaluran::factory(100)->create();


    }
}
