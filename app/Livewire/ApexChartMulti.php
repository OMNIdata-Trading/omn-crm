<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartMulti extends Component
{
    public $label;
    public $chartId;

    public function render()
    {
        return view('livewire.apex-chart-multi');
    }
}
