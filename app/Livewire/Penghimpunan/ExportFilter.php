<?php

namespace App\Livewire\Penghimpunan;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Livewire\Component;

class ExportFilter extends Component
{
    public $sumberDanas;

    public $selectedSumberDana;

    public $programSumbers;

    public $selectedProgramSumber;

    public $bulan;

    public $selectedBulan;

    public $tahuns;

    public $selectedTahun;

    public function mount()
    {
        $this->sumberDanas = SumberDana::query()->get();
        $this->programSumbers = ProgramSumber::query()->get();
        $this->tahuns = Tahun::query()->get();

    }

    public function exportExel()
    {
        
    }

    public function exportCsv()
    {

    }

    public function render()
    {
        $penghimpunans = Penghimpunan::orderByDesc('updated_at')
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->when($this->selectedSumberDana, function ($query) {
                $query->where('sumber_dana_id', $this->selectedSumberDana);
            })
            ->when($this->selectedProgramSumber, function ($query) {
                $query->where('program_sumber_id', $this->selectedProgramSumber);
            })
            ->get();

        return view('livewire.penghimpunan.export-filter', ['penghimpunans' => $penghimpunans]);
    }
}
