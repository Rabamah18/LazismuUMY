<?php

namespace App\Exports;

use App\Models\Penghimpunan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PenghimpunansExport implements FromQuery, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping
{
    public function columnFormats(): array
    {
        return [
            // 'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function query()
    {
        return Penghimpunan::query()->with('sumberDana', 'programSumber', 'tahun');
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tanggal',
            'Uraian',
            'Nominal',
            'Jumlah Lembaga',
            'Jumlah Pria',
            'Jumlah Wanita',
            'Sumber Dana',
            'Program Sumber',
            'Tahun',
        ];
    }

    public function map($penghimpunan): array
    {

        return [
            $penghimpunan->id,
            $penghimpunan->tanggal, //->isoFormat('LL'),
            $penghimpunan->uraian,
            $penghimpunan->nominal,
            $penghimpunan->lembaga_count,
            $penghimpunan->male_count,
            $penghimpunan->female_count,
            $penghimpunan->sumberDana->name ?? null,
            $penghimpunan->programSumber->name ?? null,
            $penghimpunan->tahun->name ?? null,
        ];
    }
}
