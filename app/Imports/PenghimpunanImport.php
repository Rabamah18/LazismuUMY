<?php

namespace App\Imports;

use App\Models\Penghimpunan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PenghimpunanImport implements ToModel, WithCustomCsvSettings
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Penghimpunan([
            'tanggal' => $row['0'],
            'uraian' => $row['1'],
            'nominal' => $row['2'],
            'lembaga' => $row['3'],
            'pria' => $row['4'],
            'wanita' => $row['5'],
            'sumber_dana_id' => $row['6'],
            'program_sumber_id' => $row['7'],
            'tahun_id' => $row['8'],
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
        ];
    }
}
