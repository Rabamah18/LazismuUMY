<?php

namespace App\Livewire\Penghimpunan;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Carbon\Carbon;
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

    public function updatedDateStart()
    {
        $this->resetPage();
    }

    public function updatedDateEnd()
    {
        $this->resetPage();
    }

    public function updatedSelectedBulan()
    {
        $this->resetPage();
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
