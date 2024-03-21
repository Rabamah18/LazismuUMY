<?php

namespace Database\Seeders;

use App\Models\PenerimaManfaat;
use Illuminate\Database\Seeder;

class PenerimaManfaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenerimaManfaat::factory(5)->create();
    }
}
