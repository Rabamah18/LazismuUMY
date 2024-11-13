<?php

namespace App\Livewire\Target;

use Livewire\Component;
use App\Models\TargetSumberDonasi as ModelTargetSumberDonasi;

class TargetSumberDonasi extends Component
{
    public function render()
    {
        $targetSumberDonasis = ModelTargetSumberDonasi::query()->get();
        return view('livewire.target.target-sumber-donasi', compact('targetSumberDonasis'));
    }
}
