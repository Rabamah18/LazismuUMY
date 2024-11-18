<?php

namespace App\Imports;

use App\Models\Tahun;
use App\Models\SumberDana;
use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PenghimpunanImportExel implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penghimpunan([
            // 'tanggal' => $row['tanggal'],
            'tanggal' => $this->convertExcelDate($row['tanggal']),
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

    private function convertExcelDate($value)
    {
        // Cek jika nilai adalah serial date Excel
        if (is_numeric($value)) {
            // Menggunakan PhpSpreadsheet untuk mengonversi serial date menjadi DateTime object
            $date = Date::excelToDateTimeObject($value);

            // Menggunakan Carbon untuk memformat tanggal menjadi format yang diinginkan
            return Carbon::instance($date)->format('Y-m-d');
        }

        // Jika bukan serial date, coba konversi menggunakan format tanggal umum lain
        try {
            return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        } catch (\Exception $e) {
            throw new \Exception('Invalid date format: ' . $value);
        }
    }

    public function parseRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp \s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }
}
