<?php

namespace Database\Seeders;

use App\Models\Pilar;
use Illuminate\Database\Seeder;

class PilarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $pilar = [
        'Pendidikan' => [
            'Beasiswa Sang Surya',
            'Beasiswa Mentari',
            'Save Our School',
            'Peduli Guru',
            'Lazismu Goes To Campus',
            'Muhammadiyah Scholarship Preparation Program (MSPP)',
        ],

        'Kesehatan' => [
            'Peduli Kesehatan',
            'Indonesia Mobile Clinic',
            'SAUM',
            'TIMBANG',
            'ENDTB',
            'Rumah Singgah Pasien',
            'Khitan Gratis',
        ],

        'Ekonomi' => [
            'Pemberdayaan UMKM',
            'Peternakan Masyarakat Mandiri',
            'Tani Bangkit',
            'Ketahanan Pangan',
        ],

        'Kemanusiaan' => [
            'Indonesia Siaga',
            'Sekolah Cerdas',
            'Muhammadiyah Aid',
        ],

        'Sosial Dakwah' => [
            'Pemberdayaan Disabilitas',
            'Sayangi lansia',
            'Pembedayaan Mualaf',
            'Back to Masjid',
            'Qurban',
        ],

        'Lingkungan' => [
            'Peduli Lingkungan',
            'Sayangi Daratmu',
            'Sayangi Lautmu',
        ],
       ];

       foreach($pilar as $pilarName => $programPilar) {
           $pilar = Pilar::factory()->create(['name' => $pilarName]);
           foreach ($programPilar as $programPilarName) {
               $pilar->programPilars()->create(['name' => $programPilarName]);
           }
       }
    }
}
