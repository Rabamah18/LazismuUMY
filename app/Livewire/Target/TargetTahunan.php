<?php

namespace App\Livewire\Target;

use Livewire\Component;
use App\Models\TargetTahunan as ModelTargetTahunan;

class TargetTahunan extends Component
{
    public function render()
    {
        $targetTahunans = ModelTargetTahunan::query()->get();
        return view('livewire.target.target-tahunan', compact('targetTahunans'));
    }
}
