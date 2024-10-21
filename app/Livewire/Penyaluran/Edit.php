<?php

namespace App\Livewire\Penyaluran;

use App\Models\Pilar;
use App\Models\Tahun;
use App\Models\Ashnaf;
use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\ProgramPilar;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;

class Edit extends Component
{

    #[Validate]
    public $penyaluran;

    public $tanggal;

    public $tahuns;

    public $selectedTahun;

    public $provinsis;

    public $selectedProvinsi;

    public $kabupatens;

    public $selectedKabupaten;

    public $uraian;

    public $ashnafs;

    public $selectedAshnaf;

    public $lembaga;

    public $pria;

    public $wanita;

    public $pilars;

    public $selectedPilar;

    public $programPilars;

    public $selectedProgramPilar;

    public $nominal;



    public function mount(Penyaluran $penyaluran)
    {

        $this->tanggal = Carbon::parse($this->penyaluran->tanggal)->format('Y-m-d');
        $this->tahuns = Tahun::query()->get();
        $this->selectedTahun = $this->penyaluran->tahun_id;
        $this->provinsis = Provinsi::query()->get();
        $this->selectedProvinsi = $this->penyaluran->provinsi_id;
        $this->kabupatens = Kabupaten::query()->get();
        $this->selectedKabupaten = $this->penyaluran->kabupaten_id;
        $this->uraian = $this->penyaluran->uraian;
        $this->ashnafs = Ashnaf::query()->get();
        $this->selectedAshnaf = $this->penyaluran->ashnaf_id;
        $this->lembaga = $this->penyaluran->lembaga_count;
        $this->pria = $this->penyaluran->male_count;
        $this->wanita = $this->penyaluran->female_count;
        $this->pilars = Pilar::query()->get();
        $this->selectedPilar = $this->penyaluran->programPilar->pilar_id;
        $this->programPilars = ProgramPilar::query()->get();
        $this->selectedProgramPilar = $this->penyaluran->program_pilar_id;
        $this->nominal = $this->penyaluran->nominal;



    }

    public function setPenyaluran(Penyaluran $penyaluran)
    {
        $this->tanggal = $penyaluran->tanggal;
        $this->uraian = $penyaluran->uraian;
        $this->nominal = $penyaluran->nominal;
        $this->selectedAshnaf = $penyaluran->ashnaf;
        $this->lembaga = $penyaluran->lembaga_count;
        $this->pria = $penyaluran->male_count;
        $this->wanita = $penyaluran->female_count;
        $this->selectedPilar = $penyaluran->pilar;
        $this->selectedProgramPilar = $penyaluran->programPilar;
        $this->selectedTahun = $penyaluran->tahun;
        $this->selectedProvinsi = $penyaluran->provinsi;
        $this->selectedKabupaten = $penyaluran->kabupaten;


    }

    public function rules()
    {
        return [
            'tanggal' => 'required|date',
            'selectedTahun' => 'nullable|exists:tahuns,id',
            'selectedProvinsi' => 'nullable|exists:provinsis,id',
            'selectedKabupaten' => 'nullable|exists:kabupatens,id',
            'uraian' => 'required|max:255',
            'selectedAshnaf' => 'nullable|exists:ashnafs,id',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'selectedPilar' => 'nullable|exists:pilars,id',
            'selectedProgramPilar' => 'nullable|exists:program_pilars,id',

        ];
    }

    public function updatedSelectedProvinsi()
    {
        $this->kabupatens = Kabupaten::query()->where('provinsi_id', $this->selectedProvinsi)->get();
        $this->reset('selectedKabupaten');

    }

    public function updatedSelectedPilar()
    {
        $this->programPilars = ProgramPilar::query()->where('pilar_id', $this->selectedPilar)->get();
        $this->reset('selectedProgramPilar');
    }

    public function updatePenyaluran()
    {
        $validated = $this->validate();

        $this->penyaluran->update([
            'tanggal' => $this->tanggal,
            'uraian' => $this->uraian,
            'nominal' => $this->nominal,
            'ashnaf_id' => $this->selectedAshnaf,
            'lembaga_count' => $this->lembaga,
            'male_count' => $this->pria,
            'female_count' => $this->wanita,
            'pilar_id' => $this->selectedPilar,
            'program_pilar_id' => $this->selectedProgramPilar,
            'tahun_id' => $this->selectedTahun,
            'provinsi_id' => $this->selectedProvinsi,
            'kabupaten_id' => $this->selectedKabupaten,
        ]);

        return redirect()->route('penyaluran.index');
    }

    public function render()
    {
        //dd($this->penyaluran);
        return view('livewire.penyaluran.edit');
    }
}
