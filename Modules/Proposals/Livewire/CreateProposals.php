<?php

namespace Modules\Proposals\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Proposals\Entities\Proposal;
use Modules\Proposals\Entities\ProposalDetail;
use Modules\Requests\Entities\ClientRequests;

class CreateProposals extends Component
{

    use WithFileUploads;

    public $descriptionMaxLength = 500;

    public $proposalTypes;
    public $orderNumber;
    public $proposalYears = [];

    public $proposalKind;
    public $proposalStatus;
    
    public $proposalCode;
    public $description;
    public $allRequests = [];

    public $attachments;
    public $attachmentsDescriptions;

    public $idSelectedRequest;
    public $selectedProposalType = 2; // Comercial
    public $selectedProposalYear = 1; // Ano actual
    public $selectedProposalClassification = 1; // Fornecimento
    public $selectedProposalStatus = 1; // Aberto
    public $selectedCurrency = 1; // AO

    public $proposalTotalCost = 0;
    public $proposalLeadTime;
    public $proposalExpiration = 15;
    public $selectedProposalExpirationUnity = "days"; // Dia(s)

    public $proposalDateSent;

    public function mount(){

        $this->allRequests = ClientRequests::get();
        $this->getYearsRange();
        $this->selectedProposalYear = date('Y');
        $this->fullfillProposalOrderNumberField($this->selectedProposalYear);

        $this->generateProposalCode();

        $this->attachments = [];
        $this->attachmentsDescriptions = [];
    }

    public function fullfillProposalOrderNumberField($year)
    {
        $existentProposalsCount = Proposal::whereYear('created_at', $year)->get()->count();
        $this->orderNumber = $existentProposalsCount + 1;
        $this->verifyIfNumberAlreadyExists();
    }

    public function getYearsRange($range = 3)
    {
        $actualyear = date('Y');
        for ($i = $actualyear; $i >= ($actualyear - $range); $i--) { 
            $this->proposalYears[] = $i;
        }
    }

    public function generateProposalCode()
    {
        $this->verifyIfNumberAlreadyExists();
        if($this->getErrorBag()->first('existent-order-number')){
            $this->proposalCode = '';
            return;
        }
        $this->proposalCode = "Proposal-$this->orderNumber/$this->selectedProposalYear";
    }

    public function verifyIfNumberAlreadyExists()
    {
        $numberAlreadyExists = Proposal::where('order_number', $this->orderNumber)
                            ->where('year', $this->selectedProposalYear)
                            ->exists();
        if($numberAlreadyExists){
           $this->addError('existent-order-number', 'Número de proposta já existente');
        }
    }

    public function addAttachment(){
        $this->attachmentsDescriptions[] = [
            'file_name',
        ];
    }

    public function removeAttachment($index){
        unset($this->attachments[$index]);
        unset($this->attachmentsDescriptions[$index]);
    }

    public function validateDescription(){
        $this->validate([
            'description' => 'max:500'
        ],
        [
            'description.max' => 'A descrição não pode ter mais de :max caracteres'
        ]);
    }

    public function store()
    {

        $this->validate(
            [
                'idSelectedRequest' => 'required',
                'selectedProposalType' => 'required',
                'orderNumber' => 'required',
                'selectedProposalYear' => 'required',
                'proposalCode' => 'required|unique:proposals,proposal_code',
                'selectedProposalClassification' => 'required',
                'selectedProposalStatus' => 'required',
                'selectedCurrency' => 'required',
                'proposalExpiration' => 'required|numeric|min:5|max:30',
                'selectedProposalExpirationUnity' => 'required',
                'description' => "max:$this->descriptionMaxLength",
            ],
            [
                'idSelectedRequest.required' => 'Seleccione a solicitação',
                'selectedProposalType.required' => 'Seleccione o tipo de proposta',
                'orderNumber.required' => 'Número de proposta é obrigatório',
                'selectedProposalYear.required' => 'Seleccione o ano',
                'proposalCode.required' => 'Código é obrigarótio',
                'proposalCode.unique' => 'Já existe uma proposta com este código',
                'selectedProposalClassification.required' => 'Seleccione a cliassificação',
                'selectedProposalStatus.required' => 'Seleccione o estado',
                'selectedCurrency.required' => 'Seleccione a moeda',
                'proposalExpiration.required' => 'Dado de expiração obrigatório',
                'proposalExpiration.min' => 'Deve ter no mínimo :min',
                'proposalExpiration.max' => 'Deve ter no máximo :max',
                'selectedProposalExpirationUnity.required' => 'Seleccione a unidade para a expiração',
                'description.max' => 'A descrição deve ter no máximo :max caractéres'
            ]
        );

        if($this->getErrorBag()->any()){
            return;
        }

        $latestProposal = Proposal::create([
            'type' => $this->selectedProposalType,
            'order_number' => $this->orderNumber,
            'proposal_code' => $this->proposalCode,
            'description' => $this->description,
            'year' => $this->selectedProposalYear,
            'id_request' => $this->idSelectedRequest,
            'kind' => $this->selectedProposalClassification,
            'status' => $this->selectedProposalStatus 
        ]);

        $requestStatus = ClientRequests::find($this->idSelectedRequest)->update([
            'treated' => 1
        ]);

        if(!$latestProposal && !$requestStatus){
            session()->flash('error', 'Não foi possível criar esta proposta, verifique os seus dados');
            return;
        }

        // proposalDetails
        $expirationTime = $this->proposalExpiration .' '. $this->selectedProposalExpirationUnity;

        $proposalDetails = ProposalDetail::create([
            'total_cost' => $this->proposalTotalCost,
            'lead_time' => $this->proposalLeadTime,
            'sent_to_client_at' => $this->proposalDateSent,
            'currency' => $this->selectedCurrency,
            'expiration_time' => $expirationTime,
            'id_proposal' => $latestProposal->id
        ]);

        if(!$proposalDetails){
            session()->flash('error', 'Não foi possível criar esta proposta, verifique os seus dados');
            return;
        }

        return redirect()->route('account.business.proposals.index');
    }

    public function render()
    {
        return view('proposals::livewire.create-proposals');
    }
}
