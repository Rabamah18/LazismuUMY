<?php

namespace App\Imports;

use App\Models\Ashnaf;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\Tahun;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenyaluranImportExel implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penyaluran([
            'tanggal' => $row['tanggal'],
            // 'tanggal' => Carbon::createFromFormat('d F Y', $row['Tanggal'], 'Asia/Jakarta')->format('Y-m-d H:i:s'),
            'nominal' => $row['nominal'],
            'pilar_id' => Pilar::where('name', $row['pilar'])->first()?->id,
            'program_pilar_id' => ProgramPilar::where('name', $row['program_pilar'])->first()?->id,
            'ashnaf_id' => Ashnaf::where('name', $row['ashnaf'])->first()?->id,
            'lembaga_count' => $row['jumlah_lembaga'],
            'male_count' => $row['jumlah_pria'],
            'female_count' => $row['jumlah_wanita'],
            'lokasi_id' => $row['lokasi'],
            'provinsi_id' => $row['provinsi'],
            'kabupaten_id' => $row['kabupaten'],
            'tahun_id' => Tahun::where('name', $row['tahun'])->first()?->id,
            'uraian' => $row['uraian'],
        ]);
    }
}
