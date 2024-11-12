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
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Collection;

class Create extends Component
{
    #[Validate]
    public $tanggal;

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

    public $sumberDanas;

    public $selectedSumberDana;

    public $programSumbers;

    public $selectedProgramSumber;

    public $nominal;

    public $isPindahDana;

    public function mount()
    {

        $this->tanggal = Carbon::now()->format('Y-m-d');
        $this->tahuns = Tahun::query()->get();


        // query to find the record in Tahun where 'tahun' matches the current year
        $this->selectedTahun = Tahun::query()
            ->where('name', Carbon::now()->year)
            ->first()->id;
        $this->provinsis = Provinsi::query()->get();
        // $this->kabupatens = Kabupaten::query()->get();
        $this->ashnafs = Ashnaf::query()->get();
        $this->pilars = Pilar::query()->get();
        // $this->programPilars = ProgramPilar::query()->get();
        $this->sumberDanas = SumberDana::query()->get();
        $this->programSumbers = ProgramSumber::query()->get();
    }

    public function rules()
    {
        return [
            'tanggal' => 'required|date',
            'selectedTahun' => 'nullable|exists:tahuns,id',
            'selectedProvinsi' => 'nullable|exists:provinsis,id',
            'selectedKabupaten' => 'nullable|exists:kabupatens,id',
            'uraian' => 'required|max:65535',
            'selectedAshnaf' => 'nullable|exists:ashnafs,id',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'selectedPilar' => 'nullable|exists:pilars,id',
            'selectedProgramPilar' => 'nullable|exists:program_pilars,id',
            'selectedSumberDana' => 'nullable|exists:sumber_danas,id',
            'selectedProgramSumber' => 'nullable|exists:program_sumbers,id',
            'isPindahDana' => 'nullable|boolean'


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

    public function parseRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp.\s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }

    public function createPenyaluran()
    {

        $validated = $this->validate();
        // Remove any non-numeric characters for safe storage as integer
        $nominal = $this->parseRupiah($this->nominal);
        // dd($this->nominal);

        Penyaluran::create([
            'tanggal' => $this->tanggal,
            'uraian' => $this->uraian,
            'nominal' => $nominal,
            'ashnaf_id' => $this->selectedAshnaf,
            'lembaga_count' => $this->lembaga,
            'male_count' => $this->pria,
            'female_count' => $this->wanita,
            'pilar_id' => $this->selectedPilar,
            'program_pilar_id' => $this->selectedProgramPilar,
            'sumber_dana_id' => $this->selectedSumberDana,
            'program_sumber_id' => $this->selectedProgramSumber,
            'tahun_id' => $this->selectedTahun,
            'provinsi_id' => $this->selectedProvinsi,
            'kabupaten_id' => $this->selectedKabupaten,
            'pindahdana' => $this->isPindahDana,
            'user_id' => auth()->user()->id,

        ]);

        return redirect()->route('penyaluran.index');
    }

    public function render()
    {
        return view('livewire.penyaluran.create');
    }
}
