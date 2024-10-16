<?php

namespace App\Livewire\Penyaluran;

use App\Models\Ashnaf;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\Provinsi;
use App\Models\Tahun;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate]
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

    public function mount()
    {

        $this->tahuns = Tahun::query()->get();
        $this->provinsis = Provinsi::query()->get();
        $this->kabupatens = Kabupaten::query()->get();
        $this->ashnafs = Ashnaf::query()->get();
        $this->pilars = Pilar::query()->get();
        $this->programPilars = ProgramPilar::query()->get();
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
            'selectedProgramPilar' => 'nullable|exists:programPilars,id',

        ];
    }

    public function createPenyaluran()
    {
        $validated = $this->validate();

        Penyaluran::create([
            $validated
            // 'tanggal' => $request->tanggal,
            // 'tahun_id' => $request->tahun_id,
            // 'provinsi_id' => $request->provinsi_id,
            // 'kabupaten_id' => $request->kabupaten_id,
            // 'uraian' => $request->uraian,
            // 'ashnaf_id' => $request->ashnaf_id,
            // 'lembaga_count' => $request->lembaga,
            // 'male_count' => $request->pria,
            // 'female_count' => $request->wanita,
            // 'pilar_id' => $request->pilar_id,
            // 'program_pilar_id' => $request->program_pilar_id,
            // 'nominal' => $request->nominal,
        ]);
        return redirect()->to('/penyaluran');
    }

    public function render()
    {
        return view('livewire.penyaluran.create');
    }

}
