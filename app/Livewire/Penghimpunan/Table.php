<?php

namespace App\Livewire\Penghimpunan;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $sumberDanas;

    public $selectedSumberDana;

    public $programSumbers;

    public $selectedProgramSumber;

    public $bulan;

    public $selectedBulan;

    public $tahuns;

    public $selectedTahun;

    // #[Validate('required')]
    #[Url(as: 'pencarian', history: true, keep: true)]
    public $search;

    public $paginate = 30;

    // public $showClearIcon = false;

    public function mount()
    {
        $this->sumberDanas = SumberDana::query()->get();
        $this->programSumbers = ProgramSumber::query()->get();
        $this->tahuns = Tahun::query()->get();

    }

    public function updatedSelectedBulan()
    {
        $this->resetPage();
    }

    public function render()
    {
        $penghimpunans = Penghimpunan::orderByDesc('updated_at')
            ->when($this->search, function ($query): void {
                $query->where(function ($query) {
                    $query->where('uraian', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->selectedSumberDana, function ($query) {
                $query->where('sumber_dana_id', $this->selectedSumberDana);
            })
            ->when($this->selectedProgramSumber, function ($query) {
                $query->where('program_sumber_id', $this->selectedProgramSumber);
            })
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->paginate($this->paginate);

        return view('livewire.penghimpunan.table', ['penghimpunans' => $penghimpunans]);
    }
}
