<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartSparkline extends Component
{
    public $chartColor;
    public $chartSparklineLabel;
    public $sentToday = 0;
    public $sentYesterday = 0;
    public $chartData = [];

    // internally
    public $chartMonths = [];
    public $chartDataCountPerYear = [];
    public $percentageStatus = '';
    public $lineColor = 'info';

    public $sentCountDifference = 0;

    public $chartId;

    public function mount()
    {
        $this->dataProccess();
    }

    public function updatedChartData()
    {
    }

    public function dataProccess()
    {
        if(count($this->chartData) > 0){
            foreach($this->chartData as $key => $chartCount){
                $this->chartMonths[] = (string) $key;
                // $this->chartDataCountPerYear[] = number_format($chartCount, 2, ',', '.');
                $this->chartDataCountPerYear[] = $chartCount;
            }

        }else{
        }

        $this->sentCountDifference = $this->sentToday - $this->sentYesterday;


        if($this->sentCountDifference < 0){
            $this->percentageStatus = 'decreased';

        }else if($this->sentCountDifference > 0){
            $this->percentageStatus = 'increased';

        }else{
            $this->percentageStatus = 'constant';
        }

    }
    
    public function render()
    {
        return view('livewire.apex-chart-sparkline');
    }
}
