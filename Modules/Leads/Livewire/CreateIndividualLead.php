<?php

namespace Modules\Leads\Livewire;

use App\Core\Enums\FormValidationMessages;
use App\Core\Interfaces\WithValidFileInputs;
use App\Core\Interfaces\WithValidInputs;
use Livewire\Component;
use Modules\Leads\Entities\IndividualClient;
use Modules\Leads\Entities\IndividualClientAddress;
use Modules\Leads\Entities\IndividualClientContact;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateIndividualLead extends Component implements WithValidInputs, WithValidFileInputs
{
    use WithFileUploads;

    public $fullname;
    public $nif;
    public $logo;
    public $firstPurchaseYear;
    public $firstRequestYear;
    public $website;
    public $email;
    public $contactsArray;
    public $addressesArray;

    public function mount()
    {
        $this->contactsArray = [];
        $this->addressesArray = [];
    }

    public function store()
    {
        $this->validateInputs();

        $day = date('d');
        $month = date('M');
        $year = date('Y');
        $logo_path = null;

        if($this->firstPurchaseYear == ""){
            $this->firstPurchaseYear = null;
        }
        if($this->firstRequestYear == ""){
            $this->firstRequestYear = null;
        }

        $sluggedName = Str::slug($this->fullname);
        if($this->logo){
            $logo_path = $this->logo->store("individual_clients/$sluggedName/logo/$year/$month/$day", 'public');
        }

        $newClient = IndividualClient::create([
            'fullname' => $this->fullname,
            'nif' => $this->nif,
            'logo_path' => $logo_path,
            'website' => $this->website,
            'email' => $this->email,
            'first_purchase_year' => $this->firstPurchaseYear,
            'first_request_year' => $this->firstRequestYear,
            'status' => (!is_null($this->firstPurchaseYear)) ? 2 : 1
        ]);

        if(!$newClient){
            session()->flash('error', 'Não foi possível criar o cliente \"'. $this->fullname .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        $this->linkContactsToClientIfExists($newClient);
        $this->linkAddressesToClientIfExists($newClient);

        return redirect()->route('account.leads.individuals.index')->with('success', ($newClient->whatAmI() === "lead") ? 'Lead' : 'Cliente' . " criado com êxito.");
    
    }

    public function addContact()
    {
        $this->contactsArray[] = '';
    }

    public function addAddress()
    {
        $this->addressesArray[] = '';
    }

    public function removeContact(int $index)
    {
        unset($this->contactsArray[$index]);
    }

    public function removeAddress(int $index)
    {
        unset($this->addressesArray[$index]);
    }

    public function validateFileInputs(): void
    {   
        $rules = [
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:1536', // 1.5MB
        ];
        $messages = [
            'logo.image' => 'O arquivo deve ser uma imagem',
            'logo.max' => 'O arquivo não pode ser maior que 1.5MB'
        ];

        $this->validate($rules, $messages);
    }

    public function validateInputs(): void
    {
        $rules = [
            'fullname' => 'required',
            'nif' => 'nullable|unique:individual_clients,nif',
            'email' => 'required|unique:individual_clients,email',
            'firstPurchaseYear' => 'nullable',
            'firstRequestYear' => 'nullable',
            'contactsArray.*' => 'required',
            'addressesArray.*' => 'required',
        ];
        $messages = [
            'fullname.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'nif.unique' => FormValidationMessages::existentField('NIF'),
            'email.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'email.unique' => FormValidationMessages::existentField('email'),
            'contactsArray.*.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'addressesArray.*.required' => FormValidationMessages::REQUIRED_FIELD->value,
        ];

        $this->validateFileInputs();
        $this->validate($rules, $messages);
    }

    private function linkContactsToClientIfExists(IndividualClient $client)
    {
        if(count($this->contactsArray) > 0){
            foreach($this->contactsArray as $contact){
                $clientContact = IndividualClientContact::create([ 'contact' => $contact, 'id_individual_client' => $client->id ]);
                if(!$clientContact){
                    session()->flash('error', 'Não foi possível adicionar o contacto: \"'. $contact .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    die;
                }
            }
        }
    }

    private function linkAddressesToClientIfExists(IndividualClient $client)
    {
        if(count($this->addressesArray) > 0){
            foreach($this->addressesArray as $address){
                $clientAddress = IndividualClientAddress::create([ 'address' => $address, 'id_individual_client' => $client->id ]);
                if(!$clientAddress){
                    session()->flash('error', 'Não foi possível adicionar o endereço: \"'. $address .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    die;
                }
            }
        }
    }

    public function render()
    {
        return view('leads::livewire.create-individual-lead');
    }
}
