<?php

namespace App\Livewire\Penghimpunan;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $sumberDanas;

    public $programSumbers;

    public $tahuns;

    public function mount()
    {
        $this->sumberDanas = SumberDana::all();
        $this->programSumbers = ProgramSumber::all();
        $this->tahuns = Tahun::all();

    }

    public function render()
    {
        $penghimpunans = Penghimpunan::orderByDesc('updated_at')->paginate(10);

        return view('livewire.penghimpunan.table', ['penghimpunans' => $penghimpunans]);
    }
}
