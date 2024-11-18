<?php

namespace App\Imports;

use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\SumberDana;
use App\Models\ProgramPilar;
use App\Models\ProgramSumber;
use App\Models\SumberDonasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenyaluranImportExel implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penyaluran([
            'tanggal' => $row['tanggal'],
            // 'tanggal' => Carbon::createFromFormat('d F Y', $row['Tanggal'], 'Asia/Jakarta')->format('Y-m-d H:i:s'),
            'uraian' => $row['uraian'],
            'sumber_donasi_id' => SumberDonasi::where('name', $row['sumber_donasi'])->first()?->id,
            'program_sumber_id' => ProgramSumber::where('name', $row['program_sumber'])->first()?->id,
            'sumber_dana_id' => SumberDana::where('name', $row['sumber_dana'])->first()?->id,
            'nominal' => $row['nominal'],
            'pilar_id' => Pilar::where('name', $row['pilar'])->first()?->id,
            'program_pilar_id' => ProgramPilar::where('name', $row['program_pilar'])->first()?->id,
            'ashnaf_id' => Ashnaf::where('name', $row['ashnaf'])->first()?->id,
            'lembaga_count' => $row['jumlah_lembaga'],
            'male_count' => $row['jumlah_pria'],
            'female_count' => $row['jumlah_wanita'],
            // 'lokasi_id' => $row['lokasi'],
            'provinsi_id' => Provinsi::where('name', $row['provinsi'])->first()?->id,
            'kabupaten_id' => Kabupaten::where('name', $row['kabupaten'])->first()?->id,
            'tahun_id' => Tahun::where('name', $row['tahun'])->first()?->id,
        ]);
    }
}
