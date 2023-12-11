<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartSpline extends Component
{
    public $label;
    public $chartColors = [];
    public $chartCategory1Label;
    public $chartCategory2Label;
    public $chartDataCategory1 = [];
    public $chartDataCategory2 = [];
    public $chartId;

    // internally
    public $chartMonths = [];
    public $chartDataCountPerYearCategory1 = [];
    public $chartDataCountPerYearCategory2 = [];

    public $revenuesDifferenceInPercentage = 0;


    public function mount()
    {
        $this->dataProccess();
    }

    public function updatedChartData()
    {
    }

    public function dataProccess()
    {
        if(count($this->chartDataCategory1) > 0){
            foreach($this->chartDataCategory1 as $key => $chartCountCategory1){
                $this->chartMonths[] = (string) $key;
                // $this->chartDataCountPerYear[] = number_format($chartCount, 2, ',', '.');
                $this->chartDataCountPerYearCategory1[] = $chartCountCategory1;
            }

        }else{
        }

        if(count($this->chartDataCategory2) > 0){
            foreach($this->chartDataCategory2 as $key => $chartCountCategory2){
                $this->chartMonths[] = (string) $key;
                // $this->chartDataCountPerYear[] = number_format($chartCount, 2, ',', '.');
                $this->chartDataCountPerYearCategory2[] = $chartCountCategory2;
            }

        }else{
        }

    }

    public function render()
    {
        return view('livewire.apex-chart-spline');
    }
}
