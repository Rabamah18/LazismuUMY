<?php

namespace App\Livewire\Target;

use Livewire\Component;
use App\Models\TargetProgramSumber as ModelTargetProgramSumber;

class TargetProgramSumber extends Component
{
    public function render()
    {
        $targetProgramSumbers = ModelTargetProgramSumber::query()->get();
        return view('livewire.target.target-program-sumber', compact('targetProgramSumbers'));
    }
}
