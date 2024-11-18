<?php

namespace App\Livewire\Dashboard;

use App\Models\Penghimpunan;
use App\Models\Penyaluran;
use App\Models\SumberDana;
use App\Models\SumberDonasi;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SaldoPerSumberDonasi extends Component
{
    #[Reactive]
    public $selectedTahun;

    #[Reactive]
    public $sumberDonasi;

    public $sumberDanas;

    // public function getSaldo($selectedTahun, $sumberDana, $sumberDonasi)
    // {
    //     $tunaiSaldoPenghimpunan = Penghimpunan::query()
    //         ->whereHas('programSumber', function ($query) use ($sumberDonasi) {
    //             $query->where('sumber_donasi_id', $sumberDonasi->id);
    //         })
    //         ->where('sumber_dana_id', $sumberDana->id)
    //         ->where('tahun_id', $selectedTahun)
    //         ->sum('nominal');

    //     $tunaiSaldoPenyaluran = Penyaluran::query()
    //         ->whereHas('programSumber', function ($query) use ($sumberDonasi) {
    //             $query->where('sumber_donasi_id', $sumberDonasi->id);
    //         })
    //         ->where('sumber_dana_id', $sumberDana->id)
    //         ->where('tahun_id', $selectedTahun)
    //         ->sum('nominal');

    //     return $tunaiSaldoPenghimpunan - $tunaiSaldoPenyaluran;
    // }

    public function mount($selectedTahun, $sumberDonasi)
    {
        $this->selectedTahun = $selectedTahun;
        $this->sumberDonasi = $sumberDonasi;
        $this->sumberDanas = SumberDana::query()
            ->where('name', 'like', '%'.$this->sumberDonasi->name.'%')
            ->get();

        Log::info('Received data: '.$selectedTahun);
    }

    public function updatedSelectedTahun()
    {
        $this->dispatch('updateTable');
    }

    #[On('updatedTable')]
    public function render()
    {
        // $saldoPerSumberDana = $this->getSaldo($this->selectedTahun, $this->sumberDana, $this->sumberDonasi);

        return view('livewire.dashboard.saldo-per-sumber-donasi',
            // ['selectedTahun' => $this->selectedTahun, 'sumberDanas' => $this->sumberDanas, 'sumberDonasi' => $this->sumberDonasi]
        );
    }
}
