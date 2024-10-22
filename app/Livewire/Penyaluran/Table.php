<?php

namespace App\Livewire\Penyaluran;

use App\Models\Ashnaf;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\Tahun;
use Livewire\Component;
use App\Models\Provinsi;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class Table extends Component
{
    use WithPagination;

    public Collection $tahuns;

    public $selectedTahun;

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

    // #[Validate('required')]
    #[Url(as: 'pencarian', history: true, keep: true)]
    public $search;

    public $paginate = 30;

    // public $showClearIcon = false;

    public function mount()
    {
        $this->tahuns = Tahun::query()->get();
        $this->provinsis = Provinsi::query()->get();
        $this->kabupatens = Kabupaten::query()->get();
        $this->ashnafs = Ashnaf::query()->get();
        $this->pilars = Pilar::query()->get();
        $this->programPilars = ProgramPilar::query()->get();

    }

    public function updatedSelectedTahun()
    {
        $this->resetPage();
    }

    public function updatedSelectedProvinsi()
    {
        $this->kabupatens = Kabupaten::query()->where('provinsi_id', $this->selectedProvinsi)->get();
        $this->resetPage();
        $this->reset('selectedKabupaten');
    }

    public function updatedSelectedKabupaten()
    {
        $this->resetPage();
    }

    public function updatedSelectedAshnaf()
    {
        $this->resetPage();
    }

    public function updatedSelectedPilar()
    {
        $this->programPilars = ProgramPilar::query()->where('pilar_id', $this->selectedPilar)->get();
        $this->reset('selectedProgramPilar');
        $this->resetPage();
    }

    public function updatedSelectedProgramPilar()
    {
        $this->resetPage();
    }
    public function render()
    {
        $penyalurans = Penyaluran::orderByDesc('updated_at')
            ->when($this->search, function ($query): void {
                $query->where(function ($query) {
                    $query->where('uraian', 'like', '%'.$this->search.'%')
                        ->orWhere('tanggal', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->selectedTahun, function ($query) {
                $query->where('tahun_id', $this->selectedTahun);
            })
            ->when($this->selectedProvinsi, function ($query) {
                $query->where('provinsi_id', $this->selectedProvinsi);
            })
            ->when($this->selectedKabupaten, function ($query) {
                $query->where('kabupaten_id', $this->selectedKabupaten);
            })
            ->when($this->selectedAshnaf, function ($query) {
                $query->where('ashnaf_id', $this->selectedAshnaf);
            })
            ->when($this->selectedPilar, function ($query) {
                $query->whereHas('programPilar.pilar', function ($query) {
                    $query->where('id', $this->selectedPilar);
                });
            })
            ->when($this->selectedProgramPilar, function ($query) {
                $query->where('program_pilar_id', $this->selectedProgramPilar);
            })
            ->paginate($this->paginate);

        return view('livewire.penyaluran.table', ['penyalurans' => $penyalurans]);
    }
}
