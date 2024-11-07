<?php

namespace App\Livewire\Penyaluran;

use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\SumberDana;
use App\Models\ProgramPilar;
use App\Models\ProgramSumber;
use App\Exports\PenyaluransExport;

class ExportFilter extends Component
{
    public $tahuns;

    public $selectedTahun = '';

    public $bulan;

    public $selectedBulan = '';

    public $provinsis;

    public $selectedProvinsi = '';

    public $kabupatens;

    public $selectedKabupaten = '';

    public $ashnafs;

    public $selectedAshnaf = '';

    public $lembaga;

    public $pria;

    public $wanita;

    public $pilars;

    public $selectedPilar = '';

    public $programPilars;

    public $selectedProgramPilar = '';

    public $sumberDanas;

    public $selectedSumberDana = '';

    public $programSumbers;

    public $selectedProgramSumber = '';

    public $nominal;

    public function mount()
    {
        $this->tahuns = Tahun::query()->get();
        $this->provinsis = Provinsi::query()->get();
        $this->kabupatens = Kabupaten::query()->get();
        $this->ashnafs = Ashnaf::query()->get();
        $this->pilars = Pilar::query()->get();
        $this->programPilars = ProgramPilar::query()->get();
        $this->sumberDanas = SumberDana::query()->get();
        $this->programSumbers = ProgramSumber::query()->get();

    }

    public function updatedSelectedBulan()
    {
        // $this->resetPage();
    }

    public function updatedSelectedTahun()
    {
        // $this->resetPage();
    }

    public function updatedSelectedProvinsi()
    {
        $this->kabupatens = Kabupaten::query()->where('provinsi_id', $this->selectedProvinsi)->get();
        // $this->resetPage();
        $this->reset('selectedKabupaten');
    }

    public function updatedSelectedKabupaten()
    {
        // $this->resetPage();
    }

    public function updatedSelectedAshnaf()
    {
        // $this->resetPage();
    }

    public function updatedSelectedPilar()
    {
        $this->programPilars = ProgramPilar::query()->where('pilar_id', $this->selectedPilar)->get();
        $this->reset('selectedProgramPilar');
        // $this->resetPage();
    }

    public function updatedSelectedProgramPilar()
    {
        // $this->resetPage();
    }

    public function exportExel()
    {
        return (new PenyaluransExport(str($this->selectedBulan), str($this->selectedTahun), str($this->selectedProvinsi), str($this->selectedKabupaten), str($this->selectedAshnaf), str($this->selectedPilar), str($this->selectedProgramPilar), str($this->selectedSumberDana), str($this->selectedProgramSumber)))->download('Penyaluran.xlsx');
    }

    public function exportCsv()
    {
        return (new PenyaluransExport(str($this->selectedBulan), str($this->selectedTahun), str($this->selectedProvinsi), str($this->selectedKabupaten), str($this->selectedAshnaf), str($this->selectedPilar), str($this->selectedProgramPilar), str($this->selectedSumberDana), str($this->selectedProgramSumber)))->download('Penyaluran.csv');
    }

    public function render()
    {
        $penyalurans = Penyaluran::orderByDesc('updated_at')
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
            ->when($this->selectedSumberDana, function ($query) {
                $query->where('sumber_dana_id', $this->selectedSumberDana);
            })
            ->when($this->selectedProgramSumber, function ($query) {
                $query->where('program_sumber_id', $this->selectedProgramSumber);
            })
            ->get();

        return view('livewire.penyaluran.export-filter', ['penyalurans' => $penyalurans]);
    }
}
