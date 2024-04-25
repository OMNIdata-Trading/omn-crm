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
        // dd($this->chartYears);

        $chartValues = [];
        foreach ($this->chartSeries as $serie) {
            $values = [];
            foreach ($years as $year) {
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

    // public function dataProccess()
    // {
    //     if(count($this->chartSeries) > 0){
    //         foreach($this->chartSeries as $serieKey => $serie){

    //             foreach($serie['data'] as $chartCountkey => $chartCount){

    //                 if($chartCountkey == date('Y')){
    //                     $this->currentYearHighlightValue = $chartCount;
    //                 }
    //                 $this->chartYears[] = (string) $chartCountkey;
    //                 // $chartDataCountPerYear[] = $chartCount;

    //             }

    //             $this->chartYears = array_unique($this->chartYears);
    //             rsort($this->chartYears);

    
    //             // foreach($this->chartYears as $year){
    
    //             //     if(key_exists($year, $this->chartSeries[$serieKey]['data'])){
    //             //         // $this->chartDataCountPerYear[] = $this->chartSeries[$serieKey]['data'];
    //             //         echo "na secção " . $this->chartSeries[$serieKey]['name'] . ", existe o ano $year e tem o valor de " . $this->chartSeries[$serieKey]['data'][$year] . "<br>";
    //             //     }else{
    //             //         // $this->chartDataCountPerYear[$year] = 0;
    //             //         echo "na secção " . $this->chartSeries[$serieKey]['name'] . ", não existe o ano $year e deve ter o valor de 0.<br>";
    //             //     }
    
    //             // }
    //             // var_dump( $year, key_exists($year, $this->chartSeries[$serieKey]['data']), $this->chartSeries[$serieKey]['data'], $this->chartSeries[$serieKey]['name']);
                
                
    //             // $this->chartColors[] = $serie['color'];
    //             // $this->chartTransformedSeries[] = [
    //             //     'name' => $serie['name'],
    //             //     'data' => $chartDataCountPerYear
    //             // ];
    //         }

    //         var_dump($this->chartYears);
    //         for ($index = 0; $index < count($this->chartSeries); $index++) {
    //             // foreach($this->chartYears as $year){
    
    //             //     if(key_exists($year, $this->chartSeries[$serieKey]['data'])){
    //             //         // $this->chartDataCountPerYear[] = $this->chartSeries[$serieKey]['data'];
    //             //         echo "na secção " . $this->chartSeries[$serieKey]['name'] . ", existe o ano $year e tem o valor de " . $this->chartSeries[$serieKey]['data'][$year] . "<br>";
    //             //     }else{
    //             //         // $this->chartDataCountPerYear[$year] = 0;
    //             //         echo "na secção " . $this->chartSeries[$serieKey]['name'] . ", não existe o ano $year e deve ter o valor de 0.<br>";
    //             //     }
    
    //             // }
    //         }

    //         $years = ["2024", "2022", "2020", "2015"];
    //         $chartValues = [
    //             [
    //                 "name" => 'Leads',
    //                 'data' => [0, 1, 0, 1]
    //             ],
    //             [
    //                 "name" => "Clientes",
    //                 "data" => [1, 0, 1, 1]
    //             ]
    //         ];


    //         dd($this->chartSeries, $this->chartYears, $this->chartTransformedSeries);
    //     }else{
    //         $this->currentYearHighlightValue = 0;
    //     }

    // }

    public function render()
    {
        return view('livewire.apex-chart-multi');
    }
}
