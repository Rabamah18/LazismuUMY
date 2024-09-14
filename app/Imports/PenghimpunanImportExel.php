<?php

namespace App\Imports;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenghimpunanImportExel implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penghimpunan([
            'tanggal' => $row['tanggal'],
            // 'tanggal' => Carbon::createFromFormat('d F Y', $row['Tanggal'], 'Asia/Jakarta')->format('Y-m-d H:i:s'),
            'uraian' => $row['uraian'],
            'nominal' => $row['nominal'],
            'lembaga_count' => $row['jumlah_lembaga'],
            'male_count' => $row['jumlah_pria'],
            'female_count' => $row['jumlah_wanita'],
            'sumber_dana_id' => SumberDana::where('name', $row['sumber_dana'])->first()?->id,
            'program_sumber_id' => ProgramSumber::where('name', $row['program_sumber'])->first()?->id,
            'tahun_id' => Tahun::where('name', $row['tahun'])->first()?->id,
        ]);
    }
}
