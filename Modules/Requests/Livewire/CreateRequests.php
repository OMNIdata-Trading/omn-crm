<?php

namespace Modules\Requests\Livewire;

use Livewire\Component;
use Modules\Leads\Entities\ClientColaboratorRequester;
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
    public $idClientColaborator;
    public $selectedClientColaborator;

    // events
    protected $listeners = ['addedNewClient' => 'getClientCompanies'];

    public function mount(){
        $this->getClientCompanies();
        $this->clientCompanyColaborators = [];
    }

    public function getClientCompanies(){
        $this->registeredClientCompanies = ClientCompany::get();
    }

    public function changeDetectedOnCompanySelect(){
        $this->dispatch('companySelectHasChanged');
        $this->getColaboratorsOfCompany();
        $this->generateRequestCode();
    }

    public function changeDetectedOnClientColaboratorSelect(){
        $this->selectedClientColaborator = ClientColaboratorRequester::find($this->idClientColaborator);
        $this->generateRequestCodeForSingularClients();
    }

    public function getColaboratorsOfCompany(){
        if($this->idSelectedCompany != 0){
            $this->selectedCompany = ClientCompany::find($this->idSelectedCompany);
            $this->clientCompanyColaborators = $this->selectedCompany->colaborators;
            return;
        }

        $this->clientCompanyColaborators = ClientColaboratorRequester::where('id_client_company', null)->get();
        $this->requestCode = '';
    }

    private function generateRequestCode(){

        if($this->selectedCompany != null){
            $totalOfRequestsFromCompany = 0;
            $generatedCode = '';
            $companyName = $this->selectedCompany->name;
            $nameExploded = explode(' ', $companyName);
    
            foreach($this->clientCompanyColaborators as $colaborator){
                $totalOfRequestsFromCompany += $colaborator->requests->count();
            }
    
            $theNextRequestCodeOrder = $totalOfRequestsFromCompany + 1;
            $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) . "-RQ-$theNextRequestCodeOrder";
            
            $this->requestCode = $generatedCode;
        }
        // dd($generatedCode);
    }

    private function generateRequestCodeForSingularClients(){
        $this->selectedCompany = null;

        if($this->clientCompanyColaborators != null && $this->selectedCompany == null){

            $totalOfRequestsFromSingularClient = 0;
            $generatedCode = '';
            $clientColaboratorName = $this->selectedClientColaborator->fullname;
            $nameExploded = explode(' ', $clientColaboratorName);
    
            $totalOfRequestsFromSingularClient += $this->selectedClientColaborator->requests->count();
    
            $theNextRequestCodeOrder = $totalOfRequestsFromSingularClient + 1;
            $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) . "-RQ-$theNextRequestCodeOrder";
            
            $this->requestCode = $generatedCode;
        }

    }

    public function create(){
        
    }

    public function render()
    {
        return view('requests::livewire.create-requests');
    }
}
