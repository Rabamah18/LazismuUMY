<?php

namespace App\Livewire\Penyaluran;

use App\Models\Ashnaf;
use App\Models\Kabupaten;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\ProgramSumber;
use App\Models\Provinsi;
use App\Models\SumberDana;
use App\Models\SumberDonasi;
use App\Models\Tahun;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

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

    public $sumberDanas;

    public $selectedSumberDana;

    public $programSumbers;

    public $selectedProgramSumber;

    public $sumberDonasis;

    public $selectedSumberDonasi;

    public $nominal;

    public $isPindahDana = true;

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
        $this->selectedPilar = $this->penyaluran->programPilar->pilar_id ?? '';
        $this->programPilars = ProgramPilar::query()->get();
        $this->selectedProgramPilar = $this->penyaluran->program_pilar_id;
        $this->sumberDanas = SumberDana::query()->get();
        $this->selectedSumberDana = $this->penyaluran->sumber_dana_id;
        $this->programSumbers = ProgramSumber::query()->get();
        $this->selectedProgramSumber = $this->penyaluran->program_sumber_id;
        $this->sumberDonasis = SumberDonasi::query()->get();
        $this->selectedSumberDonasi = $this->penyaluran->programSumber->sumber_donasi_id ?? '';
        $this->nominal = $this->penyaluran->nominal;
        $this->isPindahDana = $penyaluran->pindahdana;

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
        $this->selectedSumberDana = $penyaluran->sumberDana;
        $this->selectedProgramSumber = $penyaluran->programSumber;
        $this->selectedSumberDonasi = $penyaluran->sumberDonasi;
        $this->selectedTahun = $penyaluran->tahun;
        $this->selectedProvinsi = $penyaluran->provinsi;
        $this->selectedKabupaten = $penyaluran->kabupaten;
        $this->isPindahDana = $penyaluran->pindahdana;

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
            'selectedSumberDonasi' => 'required|exists:sumber_donasis,id',

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

    public function updatedSelectedSumberDonasi()
    {
        $this->programSumbers = ProgramSumber::query()->where('sumber_donasi_id', $this->selectedSumberDonasi)->get();
        $this->reset('selectedProgramSumber');
    }

    public function parseRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp.\s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }

    public function updatePenyaluran()
    {
        $validated = $this->validate();
        // Remove any non-numeric characters for safe storage as integer
        $nominal = $this->parseRupiah($this->nominal);
        // dd($this->nominal);

        $this->penyaluran->update([
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
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('penyaluran.index');
    }

    public function render()
    {
        //dd($this->penyaluran);
        return view('livewire.penyaluran.edit');
    }
}
