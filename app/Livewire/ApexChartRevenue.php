<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartRevenue extends Component
{

    public $label;
    public $currentYearHighlightValue = 0;
    public $lastYearRevenue = 0;
    public $chartColor;
    public $chartRevenueLabel;
    public $chartData = [];

    // internally
    public $chartYears = [];
    public $chartDataCountPerYear = [];
    public $percentageStatus = '';
    public $lineColor = 'info';

    public $revenuesDifferenceInPercentage = 0;

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
                $this->chartYears[] = (string) $key;
                // $this->chartDataCountPerYear[] = number_format($chartCount, 2, ',', '.');
                $this->chartDataCountPerYear[] = $chartCount;
            }

        }else{
        }

        $this->revenuesDifferenceInPercentage = ($this->lastYearRevenue > 0)
        ? ( ( $this->currentYearHighlightValue - $this->lastYearRevenue ) / $this->lastYearRevenue ) * 100
        : 0;


        if($this->revenuesDifferenceInPercentage < 0){
            $this->percentageStatus = 'decreased';
            $this->lineColor = 'red';

        }else if($this->revenuesDifferenceInPercentage > 0){
            $this->percentageStatus = 'increased';
            $this->lineColor = 'green';

        }else{
            $this->percentageStatus = 'constant';
            $this->lineColor = 'info';
        }

    }

    public function render()
    {
        return view('livewire.apex-chart-revenue');
    }
}
