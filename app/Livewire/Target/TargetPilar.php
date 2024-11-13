<?php

namespace App\Livewire\Target;

use Livewire\Component;
use App\Models\TargetPilar as ModelTargetPilar;

class TargetPilar extends Component
{
    public function render()
    {
        $targetpilars = ModelTargetPilar::query()->get();
        return view('livewire.target.target-pilar', compact('targetpilars'));
    }
}
