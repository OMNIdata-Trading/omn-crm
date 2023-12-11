<?php

namespace App\Livewire;

use Livewire\Component;

class ApexChartPie extends Component
{
    public $label;
    public $currentYearHighlightValue;
    public $chartBarLabel;
    public $chartId;
    public $chartData = [];

    // internally
    public $chartLabels = [];
    public $chartDataCountPerLabel = [];
    public $chartColors = [];

    public function mount()
    {
        $this->dataProccess();
    }

    public function dataProccess()
    {
        if(count($this->chartData) > 0){
            foreach($this->chartData as $key => $chartCount){
    
                if($key == date('Y')){
                    $this->currentYearHighlightValue = $chartCount;
                }
    
                $this->chartLabels[] = (string) $key;
                $this->chartDataCountPerLabel[] = $chartCount;
            }
        }else{
            $this->currentYearHighlightValue = 0;
        }

        $this->chartColors = $this->generateColorsForChart(count($this->chartLabels));

    }

    public function generateColorsForChart($count)
    {
        $colorsArray = [];

        for ($index = 0; $index < $count; $index++) {
            // $colorsArray[] = "rgba(". rand(0, 255) .", ". rand(0, 255) .", ". rand(0, 200) .", ". mt_rand(500, 1000) / 1000 .")";

            if ($index == 0) {
                
                $red = rand(150, 255);
                $green = rand(0, 100);
                $blue = rand(0, 100);
                
            } elseif ($index == 1) {
                
                $red = rand(0, 100);
                $green = rand(0, 100);
                $blue = rand(150, 255);

            } elseif ($index == 3) {
                
                $red = rand(0, 100);
                $green = rand(150, 255);
                $blue = rand(0, 100);

            } else {
                
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 200);
            }
        
            $opacity = mt_rand(500, 1000) / 1000;
        
            $colorsArray[] = "rgba($red, $green, $blue, $opacity)";

        }

        return $colorsArray;
    }

    public function render()
    {
        return view('livewire.apex-chart-pie');
    }
}
