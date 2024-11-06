<?php

namespace App\Livewire\Penyaluran;

use Carbon\Carbon;
use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\ProgramPilar;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class Table extends Component
{
    use WithPagination;

    public Collection $tahuns;

    public $selectedTahun;

    public $bulan;

    public $selectedBulan;

    public $dateStart;

    public $dateEnd;

    public $provinsis;

    public $selectedProvinsi;

    public Collection $kabupatens;

    public $selectedKabupaten;

    public $uraian;

    public $ashnafs;

    public $selectedAshnaf;

    public $lembaga;

    public $pria;

    public $wanita;

    public $pilars;

    public $selectedPilar;

    public Collection $programPilars;

    public $selectedProgramPilar;

    public $nominal;

    public $total;

    // #[Validate('required')]
    #[Url(as: 'pencarian', history: true, keep: true)]
    public $search;

    public $paginate = 30;

    // public $showClearIcon = false;

    public function mount()
    {
        $this->dateEnd = Carbon::now()->format('Y-m-d');
        $this->tahuns = Tahun::query()->get();
        $this->provinsis = Provinsi::query()->get();
        $this->kabupatens = Kabupaten::query()->get();
        $this->ashnafs = Ashnaf::query()->get();
        $this->pilars = Pilar::query()->get();
        $this->programPilars = ProgramPilar::query()->get();

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

    public function updatedSelectedProvinsi()
    {
        $this->kabupatens = Kabupaten::query()->where('provinsi_id', $this->selectedProvinsi)->get();
        $this->resetPage();
        $this->reset('selectedKabupaten');
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedKabupaten()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedAshnaf()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedPilar()
    {
        $this->programPilars = ProgramPilar::query()->where('pilar_id', $this->selectedPilar)->get();
        $this->reset('selectedProgramPilar');
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }

    public function updatedSelectedProgramPilar()
    {
        $this->resetPage();
        $this->dispatch('dataUpdated');
    }



    public function updatedTotal()
    {

    }
    
    public function render()
    {
        $penyalurans = Penyaluran::orderByDesc('updated_at')
            ->when($this->search, function ($query): void {
                $query->where(function ($query) {
                    $query->where('uraian', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->dateStart && $this->dateEnd, function ($query) {
                $query->whereBetween('tanggal', [Carbon::parse($this->dateStart)->startOfDay(),
                Carbon::parse($this->dateEnd)->endOfDay()]);
            })
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->when($this->selectedProvinsi, function ($query) {
                $query->whereHas('kabupaten', function ($query) {
                    $query->where('provinsi_id', $this->selectedProvinsi);
                });
            })
            ->when($this->selectedKabupaten, function ($query) {
                $query->where('kabupaten_id', $this->selectedKabupaten);
            })
            ->when($this->selectedAshnaf, function ($query) {
                $query->where('ashnaf_id', $this->selectedAshnaf);
            })
            ->when($this->selectedPilar, function ($query) {
                $query->whereHas('programPilar', function ($query) {
                    $query->where('pilar_id', $this->selectedPilar);
                });
            })
            ->when($this->selectedProgramPilar, function ($query) {
                $query->where('program_pilar_id', $this->selectedProgramPilar);
            })
            ->paginate($this->paginate);

        //Get the Filter Data
        $penyaluransQuery = Penyaluran::orderByDesc('updated_at')
            ->when($this->search, function ($query) {
                $query->where('uraian', 'like', '%' . $this->search . '%');
            })
            ->when($this->dateStart && $this->dateEnd, function ($query) {
                $query->whereBetween('tanggal', [
                    Carbon::parse($this->dateStart)->startOfDay(),
                    Carbon::parse($this->dateEnd)->endOfDay()
            ]);
        })
            ->when($this->selectedBulan, function ($query) {
                $query->whereMonth('tanggal', $this->selectedBulan);
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
    ->when($this->selectedProvinsi, function ($query) {
        $query->whereHas('kabupaten', function ($query) {
            $query->where('provinsi_id', $this->selectedProvinsi);
        });
    })
    ->when($this->selectedKabupaten, function ($query) {
        $query->where('kabupaten_id', $this->selectedKabupaten);
    })
    ->when($this->selectedAshnaf, function ($query) {
        $query->where('ashnaf_id', $this->selectedAshnaf);
    })
    ->when($this->selectedPilar, function ($query) {
        $query->whereHas('programPilar', function ($query) {
            $query->where('pilar_id', $this->selectedPilar);
        });
    })
    ->when($this->selectedProgramPilar, function ($query) {
        $query->where('program_pilar_id', $this->selectedProgramPilar);
    })->get();

    $totalNominal = $penyaluransQuery->sum('nominal');
    $lembagaCount = $penyaluransQuery->sum('lembaga_count');
    $maleCount = $penyaluransQuery->sum('male_count');
    $femaleCount = $penyaluransQuery->sum('female_count');

// Get all results without pagination
// $penyalurans = $penyaluransQuery->get();

// Calculate totals
// $totals = $penyaluransQuery->select([
//     DB::raw('SUM(nominal) as total_nominal'),
//     DB::raw('SUM(lembaga_count) as total_lembaga'),
//     DB::raw('SUM(male_count) as total_pria'),
//     DB::raw('SUM(female_count) as total_wanita'),
//     // DB::raw('COUNT(DISTINCT ashnaf_id) as total_ashnaf')
//     ])->first();

        return view('livewire.penyaluran.table', ['penyalurans' => $penyalurans, 'totalNominal' => $totalNominal, 'lembagaCount' => $lembagaCount, 'maleCount' => $maleCount, 'femaleCount' => $femaleCount]);
    }
}
