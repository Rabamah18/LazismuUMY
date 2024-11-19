<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Tahun;
use App\Models\SumberDana;
use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PenghimpunanImportCsv implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Penghimpunan([
            'tanggal' => Carbon::createFromFormat('d/m/Y', $row['tanggal'])->toDateTimeString(),
            'uraian' => $row['uraian'],
            'nominal' => $this->parseRupiah($row['nominal']),
            'lembaga_count' => $row['jumlah_lembaga'],
            'male_count' => $row['jumlah_pria'],
            'female_count' => $row['jumlah_wanita'],
            'no_name_count' => $row['jumlah_wanita'],
            'program_sumber_id' => ProgramSumber::where('name', $row['program_sumber'])->first()?->id,
            'sumber_dana_id' => SumberDana::where('name', $row['sumber_dana'])->first()?->id,
            'tahun_id' => Tahun::where('name', $row['tahun'])->first()?->id,
            'user_id' => Auth()->user()->id
        ]);
    }

    public function parseRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp \s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
        ];
    }
}
