<?php

namespace App\Livewire\Target;

use Livewire\Component;
use App\Models\TargetProgramPilar as ModelTargetProgramPilar;

class TargetProgramPilar extends Component
{
    public function render()
    {
        $targetProgramPilars = ModelTargetProgramPilar::query()->get();
        return view('livewire.target.target-program-pilar', compact('targetProgramPilars'));
    }
}
