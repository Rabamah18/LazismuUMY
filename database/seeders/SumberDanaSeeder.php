<?php

namespace Database\Seeders;

use App\Models\SumberDana;
use Illuminate\Database\Seeder;

class SumberDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SumberDana::factory(5)->create();

        SumberDana::factory()->count(3)->sequence(
            ['name' => 'BSI Zakat'],
            ['name' => 'BSI Infaq'],
            ['name' => 'BPDDIY Infaq']
        )->create();
    }
}
