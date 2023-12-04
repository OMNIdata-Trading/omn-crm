<?php

namespace App\Livewire;

use Livewire\Component;

class ApexCharts extends Component
{
    public $label;
    public $currentYearHighlightValue;
    public $chartColor;
    public $chartBarLabel;
    public $chartData = [];

    // internally
    public $chartYears = [];
    public $chartDataCountPerYear = [];

    public $chartId;

    public function mount()
    {
        // dd($this->chartData);
        $this->dataProccess();
    }

    public function updatedChartData()
    {
    }

    public function dataProccess()
    {
        if(count($this->chartData) > 0){
            foreach($this->chartData as $key => $chartCount){
    
                if($key == date('Y')){
                    $this->currentYearHighlightValue = $chartCount;
                }
    
                $this->chartYears[] = (string) $key;
                $this->chartDataCountPerYear[] = $chartCount;
            }
        }else{
            $this->currentYearHighlightValue = 0;
        }

    }

    public function render()
    {
        return view('livewire.apex-charts');
    }
}
