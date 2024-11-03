<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class InfoStatistic extends Component
{
    public $financialValue = 'Rp 370.110.000';
    public $percentage = '15%';

    public $chosenPeriodData = [
        23000, 44000, 55000, 57000, 56000, 61000, 58000, 63000, 60000, 66000, 34000, 78000
    ];

    public $lastPeriodData = [
        17000, 76000, 85000, 101000, 98000, 87000, 105000, 91000, 114000, 94000, 67000, 66000
    ];
    public function render()
    {
        return view('livewire.dashboard.info-statistic');
    }
}
