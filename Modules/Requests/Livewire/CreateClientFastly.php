<?php

namespace Modules\Requests\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;

class CreateClientFastly extends Component
{
    #[Rule('unique:client_companies,name')]
    public $companyLeadName = '';

    #[Rule('required')]
    public $clientRequesterName = '';
    #[Rule('required|unique:client_colaborator_requesters,email')]
    public $clientRequesterEmail = '';

    public $isRegisteredCompany;
    public $registeredClientCompanies;
    public $selectedCompany;

    public function create(){

        if(!$this->isRegisteredCompany){
            if($this->companyLeadName){
                $latestCompany = ClientCompany::create([
                    'name' => $this->companyLeadName
                ]);
                $args = [
                    'fullname' => $this->clientRequesterName,
                    'email' => $this->clientRequesterEmail,
                    'id_client_company' => $latestCompany->id
                ];
            }else{
                $args = [
                    'fullname' => $this->clientRequesterName,
                    'email' => $this->clientRequesterEmail,
                    'id_client_company' => null
                ];
            }

        }else{
            $args = [
                'fullname' => $this->clientRequesterName,
                'email' => $this->clientRequesterEmail,
                'id_client_company' => $this->selectedCompany
            ];
        }
        
        $requisitant = ClientColaboratorRequester::create($args);

        if(!$requisitant){
            session()->flash('error', 'Erro ao completar esta acção');
        }
        
        session()->flash('success', 'Cliente criado com êxito');
        $this->reset();

        $this->dispatch('addedNewClient');
        return;

    }

    

    public function mount(){
        $this->getClientCompanies();
    }

    public function changeToggleCheckState(){}

    public function changeSelectedCompany(){}

    public function getClientCompanies(){
        $this->registeredClientCompanies = ClientCompany::get();
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lead</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="create">
                        <div class="modal-body">
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible" role=alert>
                                {{ session('error') }}
                            </div>
                            @elseif (session('success'))
                            <div class="alert alert-success alert-dismissible" role=alert>
                                <div class="d-flex">
                                    {{ session('success') }}
                                </div>
                                <a class="btn-close" data-bs-dismissable="alert" aria-label="close
                                "></a>
                            </div>
                            @endif
                            <div class="mb-6">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" wire:model="isRegisteredCompany" wire:change="changeToggleCheckState" type="checkbox">
                                    <span class="form-check-label">Empresa registrada</span>
                                </label>
                            </div>
                            @if(!$isRegisteredCompany)
                            <div class="mb-3">
                                <label class="form-label">Nome da Entidade</label>
                                <input
                                type="text"
                                class="form-control @error('companyLeadName') is-invalid @enderror"
                                name="companyLeadName"
                                wire:model.blur="companyLeadName"
                                placeholder=""
                                >
                                <div class="invalid-feedback">
                                    @error('companyLeadName')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            @else
                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                {{--  --}}
                                <select
                                type="text"
                                class="form-select"
                                name="selectedCompany"
                                wire:model="selectedCompany"
                                wire:change="changeSelectedCompany"
                                id="select-company-requester"
                                >
                                    <option value="null" disabled selected>-- Seleccione o client --</option>
                                    @forelse ($registeredClientCompanies as $registeredClientCompany)
                                        @if ($registeredClientCompany->logo_path)
                                        <option value="{{ $registeredClientCompany->id }}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{ URL::to($registeredClientCompany->logo_path) }})&quot;&gt;&lt;/span&gt;">
                                            {{ $registeredClientCompany->name }}
                                        </option>
                                        @else
                                        <option value="{{ $registeredClientCompany->id }}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;{{ getTheInitialLetters($registeredClientCompany->name) }}&lt;/span&gt;">
                                            {{ $registeredClientCompany->name }}
                                        </option>
                                        @endif
                                    @empty
                                    <option value="no-records" disabled>-- No records --</option>
                                    @endforelse
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nome da pessoa de contacto</label>
                                        <input
                                        type="text"
                                        name="clientRequesterName"
                                        wire:model="clientRequesterName"
                                        class="form-control"
                                        placeholder=""
                                        required
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input
                                        type="email"
                                        name="clientRequesterEmail"
                                        wire:model.blur="clientRequesterEmail"
                                        class="form-control @error('clientRequesterEmail') is-invalid @enderror"
                                        placeholder=""
                                        >
                                    </div>
                                    <div class="invalid-feedback">
                                        @error('clientRequesterEmail')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" wire:loading.remove>
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary ms-auto">
                                <span class="label">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Criar lead
                                </span>
                                <!-- <div wire:loading class="spinner-border spinner-border-md text-white" role="status">
                                </div> -->
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        HTML;
    }
}
