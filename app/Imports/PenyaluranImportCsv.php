<?php

namespace App\Imports;

use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use App\Models\Penyaluran;
use App\Models\ProgramPilar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenyaluranImportCsv implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penyaluran([
            'tanggal' => $row['tanggal'],
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

    public function getCsvSettings(): array
    {
        return [
            'delimeter' => ',',
        ];
    }
}
