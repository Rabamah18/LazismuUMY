<?php

namespace App\Exports;

use App\Models\Penghimpunan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PenghimpunansExport implements FromQuery, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping
{
    use Exportable;

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

    public string $month;

    public string $year;

    public string $sumDa;

    public string $proSum;

    public function __construct(string $month, string $year, string $sumDa, string $proSum)
    {
        $this->month = $month;
        $this->year = $year;
        $this->sumDa = $sumDa;
        $this->proSum = $proSum;

    }

    public function query()
    {
        // return Penghimpunan::query()->with('sumberDana', 'programSumber', 'tahun');

        return Penghimpunan::orderByDesc('updated_at')
            ->with('sumberDana', 'programSumber', 'tahun')
            ->when($this->month, function ($query) {
                $query->whereMonth('tanggal', $this->month);
            })
            ->when($this->year, function ($query) {
                $query->where('tahun_id', $this->year);
            })
            ->when($this->sumDa, function ($query) {
                $query->where('sumber_dana_id', $this->sumDa);
            })
            ->when($this->proSum, function ($query) {
                $query->where('program_sumber_id', $this->proSum);
            });
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
