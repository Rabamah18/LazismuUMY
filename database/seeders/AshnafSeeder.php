<?php

namespace Database\Seeders;

use App\Models\Ashnaf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AshnafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ashnaf::factory(10)->create();
    }
}
