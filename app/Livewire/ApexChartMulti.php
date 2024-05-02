<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartMulti extends Component
{
    public $label;
    public $currentYearHighlightValue;
    public $chartSeries = [];
    public $chartColors = [];

    // internally
    public $chartTransformedSeries = [];
    public $chartYears = [];
    public $chartDataCountPerYear = [];

    public $chartId;

    public function mount()
    {
        // dd($this->chartSeries);
        $this->dataProccess();
    }

    public function updatedChartData()
    {
    }

    public function dataProccess()
    {
        $years = [];
        foreach ($this->chartSeries as $serie) {
            $years = array_merge($years, array_map('strval', array_keys($serie['data'])));
        }
        $years = array_unique($years);
        rsort($years);

        $this->chartYears = $years;

        $chartValues = [];
        foreach ($this->chartSeries as $serie) {
            $values = [];
            foreach ($years as $year) {
                if(empty($this->currentYearHighlightValue) && $year === date('Y')){
                    $this->currentYearHighlightValue = isset($serie['data'][$year]) ? $serie['data'][$year] : 0;
                }
                $values[] = isset($serie['data'][$year]) ? $serie['data'][$year] : 0;
            }
            
            $this->chartColors[] = $serie['color'];
            $chartValues[] = [
                "name" => $serie['name'],
                "data" => $values
            ];
        }

        $this->chartTransformedSeries = $chartValues;

    }

    public function render()
    {
        return view('livewire.apex-chart-multi');
    }
}
