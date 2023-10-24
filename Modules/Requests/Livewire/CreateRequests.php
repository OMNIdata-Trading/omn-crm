<?php

namespace Modules\Requests\Livewire;

use Livewire\Component;
use Modules\Leads\Entities\ClientCompany;
use Modules\Requests\Entities\ClientRequests;

class CreateRequests extends Component
{
    public $registeredClientCompanies;
    public $clientCompanyColaborators;
    public $order;
    public $requestCode;
    public $requestDate;
    public $allColaborators;
    public $description;
    public $hasTasks;
    public $tasks;
    
    //
    public $idSelectedCompany;
    public $selectedCompany;
    public $selectedColaborators;

    // events
    // protected $listeners = ['companySelectHasChanged' => 'getColaboratorsOfCompany'];

    public function mount(){
        $this->registeredClientCompanies = ClientCompany::get();
        $this->clientCompanyColaborators = [];
    }

    public function changeDetected(){
        $this->dispatch('companySelectHasChanged');
        $this->getColaboratorsOfCompany();
        $this->generateRequestCode();
    }

    public function getColaboratorsOfCompany(){
        $this->selectedCompany = ClientCompany::find($this->idSelectedCompany);
        $this->clientCompanyColaborators = $this->selectedCompany->colaborators;
    }

    private function generateRequestCode(){

        $totalOfRequestsFromCompany = 0;
        $generatedCode = '';
        $companyName = $this->selectedCompany->name;
        $nameExploded = explode(' ', strtoupper($companyName));

        foreach($this->clientCompanyColaborators as $colaborator){
            $totalOfRequestsFromCompany += $colaborator->requests->count();
        }

        $theNextRequestCodeOrder = $totalOfRequestsFromCompany + 1;
        $generatedCode = str_replace(' ', '_', $nameExploded[0]) . "-RQ-$theNextRequestCodeOrder";

        $this->requestCode = $generatedCode;

        // dd($generatedCode);
    }

    public function create(){
        
    }

    public function render()
    {
        return view('requests::livewire.create-requests');
    }
}
