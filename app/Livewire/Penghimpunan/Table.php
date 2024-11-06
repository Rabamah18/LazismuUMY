<?php

namespace App\Livewire\Penghimpunan;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Carbon\Carbon;
use Livewire\Attributes\On;
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

    public $dateStart;

    public $dateEnd;

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
        $this->dateEnd = Carbon::now()->format('Y-m-d');
        $this->sumberDanas = SumberDana::query()->get();
        $this->programSumbers = ProgramSumber::query()->get();
        $this->tahuns = Tahun::query()->get();

    }

    public function updatedSearch()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedDateStart()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedDateEnd()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedTahun()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedBulan()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedSumberDana()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedProgramSumber()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function formatRupiah($value)
    {
        return 'Rp. '.number_format($value, 0, ',', '.');
    }

    public function render()
    {
        $penghimpunans = Penghimpunan::orderByDesc('updated_at')
            ->when($this->search, function ($query): void {
                $query->where(function ($query) {
                    $query->where('uraian', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->dateStart && $this->dateEnd, function ($query) {
                $query->whereBetween('tanggal', [Carbon::parse($this->dateStart)->startOfDay(),
                    Carbon::parse($this->dateEnd)->endOfDay()]);
            })
            ->when($this->selectedSumberDana, function ($query) {
                $query->where('sumber_dana_id', $this->selectedSumberDana);
            })
            ->when($this->selectedProgramSumber, function ($query) {
                if ($this->selectedProgramSumber === 'zakat') {
                    // Filter by related `ProgramSumber` where name contains "zakat"
                    $query->whereHas('programSumber', function ($subQuery) {
                        $subQuery->where('name', 'like', '%zakat%');
                    });
                } else {
                    // Otherwise, filter by specific `program_sumber_id`
                    $query->where('program_sumber_id', $this->selectedProgramSumber);
                }
            })
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->paginate($this->paginate);

        // Get the filtered data
        $penghimpunansQuery = Penghimpunan::orderByDesc('updated_at')
            ->when($this->search, function ($query) {
                $query->where('uraian', 'like', '%'.$this->search.'%');
            })
            ->when($this->dateStart && $this->dateEnd, function ($query) {
                $query->whereBetween('tanggal', [
                    Carbon::parse($this->dateStart)->startOfDay(),
                    Carbon::parse($this->dateEnd)->endOfDay(),
                ]);
            })
            ->when($this->selectedSumberDana, function ($query) {
                $query->where('sumber_dana_id', $this->selectedSumberDana);
            })
            ->when($this->selectedProgramSumber, function ($query) {
                if ($this->selectedProgramSumber === 'zakat') {
                    $query->whereHas('programSumber', function ($subQuery) {
                        $subQuery->where('name', 'like', '%zakat%');
                    });
                } else {
                    $query->where('program_sumber_id', $this->selectedProgramSumber);
                }
            })
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->get();

        $totalNominal = $penghimpunansQuery->sum('nominal');
        $lembagaCount = $penghimpunansQuery->sum('lembaga_count');
        $maleCount = $penghimpunansQuery->sum('male_count');
        $femaleCount = $penghimpunansQuery->sum('female_count');
        $noNameCount = $penghimpunansQuery->sum('no_name_count');

        return view('livewire.penghimpunan.table', ['penghimpunans' => $penghimpunans, 'totalNominal' => $totalNominal, 'lembagaCount' => $lembagaCount, 'maleCount' => $maleCount, 'femaleCount' => $femaleCount, 'noNameCount' => $noNameCount]);
    }
}
