<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\SumberDana;
use App\Models\ProgramPilar;
use App\Models\SumberDonasi;
use App\Models\ProgramSumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PenyaluranImportCsv implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penyaluran([
            'tanggal' => Carbon::createFromFormat('d/m/Y', $row['tanggal'])->toDateTimeString(),
            'uraian' => $row['uraian'],
            'sumber_donasi_id' => SumberDonasi::where('name', $row['sumber_donasi'])->first()?->id,
            'program_sumber_id' => ProgramSumber::where('name', $row['program_sumber'])->first()?->id,
            'sumber_dana_id' => SumberDana::where('name', $row['sumber_dana'])->first()?->id,
            'nominal' => $this->parseRupiah($row['nominal']),
            'pilar_id' => Pilar::where('name', $row['pilar'])->first()?->id,
            'program_pilar_id' => ProgramPilar::where('name', $row['program_pilar'])->first()?->id,
            'ashnaf_id' => Ashnaf::where('name', $row['ashnaf'])->first()?->id,
            'lembaga_count' => $row['jumlah_lembaga'],
            'male_count' => $row['jumlah_pria'],
            'female_count' => $row['jumlah_wanita'],
            'provinsi_id' => Provinsi::where('name', $row['provinsi'])->first()?->id,
            'kabupaten_id' => Kabupaten::where('name', $row['kabupaten'])->first()?->id,
            'tahun_id' => Tahun::where('name', $row['tahun'])->first()?->id,
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
            'delimeter' => ',',
        ];
    }
}
