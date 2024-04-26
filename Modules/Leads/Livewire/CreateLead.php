<?php

namespace Modules\Leads\Livewire;

use App\Core\Enums\FormValidationMessages;
use App\Core\Interfaces\WithValidFileInputs;
use App\Core\Interfaces\WithValidInputs;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\ClientCompanyAddress;
use Modules\Leads\Entities\ClientCompanyContact;
use Illuminate\Support\Str;

class CreateLead extends Component implements WithValidInputs, WithValidFileInputs
{
    use WithFileUploads;

    public $name;
    public $nif;
    public $logo;
    public $actuationArea;
    public $firstPurchaseYear;
    public $firstRequestYear;
    public $website;
    public $email;
    public $contactsArray;
    public $addressesArray;
    public $companyColaboratorsArray;

    public function mount()
    {
        $this->contactsArray = [];
        $this->addressesArray = [];
        $this->companyColaboratorsArray[] = [
            'fullname' => '',
            'email' => '',
            'phone_number1' => '',
            'phone_number2' => '',
            'phone_number3' => '',
            'id_client_company' => 0
        ];
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

        $sluggedName = Str::slug($this->name);
        if($this->logo){
            $logo_path = $this->logo->store("clients/$sluggedName/logo/$year/$month/$day", 'public');
        }

        $newClient = ClientCompany::create([
            'name' => $this->name,
            'nif' => $this->nif,
            'logo_path' => $logo_path,
            'website' => $this->website,
            'company_email' => $this->email,
            'activity_area' => $this->actuationArea,
            'first_purchase_year' => $this->firstPurchaseYear,
            'first_request_year' => $this->firstRequestYear,
            'status' => (!is_null($this->firstPurchaseYear)) ? 2 : 1
        ]);

        if(!$newClient){
            session()->flash('error', 'Não foi possível criar o cliente \"'. $this->name .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        $this->linkContactsToClientIfExists($newClient);
        $this->linkAddressesToClientIfExists($newClient);
        $this->linkColaboratorsToClientCompanyIfExists($newClient);

        return redirect()->route('account.leads.businesses.index')->with('success', ($newClient->whatAmI() === "lead") ? 'Lead' : 'Cliente' . " criado com êxito.");
    
    }

    public function addContact()
    {
        $this->contactsArray[] = '';
    }

    public function addAddress()
    {
        $this->addressesArray[] = '';
    }

    public function addColaborator()
    {
        $this->companyColaboratorsArray[] = [
            'fullname' => '',
            'email' => '',
            'phone_number1' => '',
            'phone_number2' => '',
            'phone_number3' => '',
            'id_client_company' => 0
        ];
    }

    public function removeContact(int $index)
    {
        unset($this->contactsArray[$index]);
    }

    public function removeAddress(int $index)
    {
        unset($this->addressesArray[$index]);
    }

    public function removeColaborator(int $index)
    {
        unset($this->companyColaboratorsArray[$index]);
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
            'name' => 'required',
            'nif' => 'nullable|unique:client_companies,nif',
            'email' => 'required|unique:client_companies,company_email',
            'firstPurchaseYear' => 'nullable',
            'firstRequestYear' => 'nullable',
            'contactsArray.*' => 'required',
            'addressesArray.*' => 'required',
            'companyColaboratorsArray.*.fullname' => 'required',
            'companyColaboratorsArray.*.email' => 'required',
        ];
        $messages = [
            'name.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'nif.unique' => FormValidationMessages::existentField('NIF'),
            'email.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'email.unique' => FormValidationMessages::existentField('email'),
            'contactsArray.*.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'addressesArray.*.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'companyColaboratorsArray.*.fullname.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'companyColaboratorsArray.*.email.required' => FormValidationMessages::REQUIRED_FIELD->value,
        ];

        $this->validateFileInputs();
        $this->validate($rules, $messages);
    }

    private function linkContactsToClientIfExists(ClientCompany $client)
    {
        if(count($this->contactsArray) > 0){
            foreach($this->contactsArray as $contact){
                $clientContact = ClientCompanyContact::create([ 'contact' => $contact, 'id_client_company' => $client->id ]);
                if(!$clientContact){
                    session()->flash('error', 'Não foi possível adicionar o contacto: \"'. $contact .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    die;
                }
            }
        }
    }

    private function linkAddressesToClientIfExists(ClientCompany $client)
    {
        if(count($this->addressesArray) > 0){
            foreach($this->addressesArray as $address){
                $clientAddress = ClientCompanyAddress::create([ 'address' => $address, 'id_client_company' => $client->id ]);
                if(!$clientAddress){
                    session()->flash('error', 'Não foi possível adicionar o endereço: \"'. $address .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    die;
                }
            }
        }
    }

    private function linkColaboratorsToClientCompanyIfExists(ClientCompany $client)
    {
        if(count($this->companyColaboratorsArray) > 0){
            foreach($this->companyColaboratorsArray as $colaborator){
                $colaborator['id_client_company'] = $client->id;
                
                $companyColaborator = ClientColaboratorRequester::create($colaborator);
                if(!$companyColaborator){
                    session()->flash('error', 'Não foi possível adicionar o colaborador: \"'. $colaborator['fullname'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    die;
                }
            }
        }
    }

    public function render()
    {
        return view('leads::livewire.create-lead');
    }
}
