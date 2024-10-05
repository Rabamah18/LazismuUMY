<?php

namespace App\Exports;

use App\Models\Penyaluran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PenyaluransExport implements FromQuery, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping
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
        return Penyaluran::query()->with('pilar', 'programPilar', 'ashnaf', 'tahun');
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tanggal',
            'Nominal',
            'Pilar',
            'Program Pilar',
            'Ashnaf',
            'Jumlah Lembaga',
            'Jumlah Pria',
            'Jumlah Wanita',
            'Provinsi',
            'Kabupaten',
            'Tahun',
            'Uraian',

        ];
    }

    public function map($penyaluran): array
    {

        return [
            $penyaluran->id,
            $penyaluran->tanggal, //->isoFormat('LL'),
            $penyaluran->nominal,
            $penyaluran->programPilar->pilar->name ?? null,
            $penyaluran->programPilar->name ?? null,
            $penyaluran->ashnaf->name ?? null,
            $penyaluran->lembaga_count,
            $penyaluran->male_count,
            $penyaluran->female_count,
            $penyaluran->lokasi->provinsi->name ?? null,
            $penyaluran->lokasi->kabupaten->name ?? null,
            $penyaluran->tahun->name ?? null,
            $penyaluran->uraian,
        ];
    }
}
