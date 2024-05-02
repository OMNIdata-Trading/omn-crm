<?php

namespace Modules\Leads\Livewire;

use App\Core\Enums\FormValidationMessages;
use App\Core\Interfaces\WithValidFileInputs;
use App\Core\Interfaces\WithValidInputs;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\ClientCompanyAddress;
use Modules\Leads\Entities\ClientCompanyContact;

class EditLead extends Component implements WithValidInputs, WithValidFileInputs
{
    use WithFileUploads;

    public $client;

    public $id;
    public $name;
    public $nif;
    public $logo;
    public $registeredLogo;
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
        $this->client = $this->getClientById($this->id);
        
        $this->name = $this->client->name;
        $this->nif = $this->client->nif;
        $this->registeredLogo = $this->client->logo_path;
        $this->actuationArea = $this->client->activity_area;
        $this->firstPurchaseYear = $this->client->first_purchase_year;
        $this->firstRequestYear = $this->client->first_request_year;
        $this->website = $this->client->website;
        $this->email = $this->client->company_email;
        $this->contactsArray = $this->client->contacts->toArray();
        $this->addressesArray = $this->client->addresses->toArray();
        $this->companyColaboratorsArray = $this->client->colaborators->toArray();

    }

    private function getClientById(int $id)
    {
        return ClientCompany::find($id);
    }

    public function update()
    {
        $this->validateInputs();

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
            $logo_path = $this->logo->store("clients/$sluggedName/logo/$year", 'public');
        }else{
            $logo_path = $this->registeredLogo;
        }

        $updatedClient = ClientCompany::find($this->id)->update([
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

        if(!$updatedClient){
            session()->flash('error', 'Não foi possível editar o cliente \"'. $this->name .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        $this->updateOrInsertContacts();
        $this->updateOrInsertAddresses();
        $this->updateOrInsertColaborators();

        return redirect()->route('account.leads.businesses.index')->with('success', (($this->client->whatAmI() === "lead") ? 'Lead' : 'Cliente') . " alterado com êxito.");
    
    }

    public function addContact()
    {
        $this->contactsArray[]['contact'] = '';
    }

    public function addAddress()
    {
        $this->addressesArray[]['address'] = '';
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
        if(isset($this->contactsArray[$index]['id'])){
            $deletedContact = ClientCompanyContact::find($this->contactsArray[$index]['id'])->delete();
            if(!$deletedContact){
                session()->flash('error', 'Não foi possível remover o contacto: \"'. $this->contactsArray[$index]['contact'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                die();
            }
        }

        unset($this->contactsArray[$index]);
    }

    public function removeAddress(int $index)
    {
        if(isset($this->addressesArray[$index]['id'])){
            $deletedAddress = ClientCompanyAddress::find($this->addressesArray[$index]['id'])->delete();
            if(!$deletedAddress){
                session()->flash('error', 'Não foi possível remover o endereço: \"'. $this->addressesArray[$index]['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                die();
            }
        }

        unset($this->addressesArray[$index]);
    }

    public function removeColaborator(int $index)
    {
        if(isset($this->companyColaboratorsArray[$index]['id'])){
            $deletedColaborator = ClientColaboratorRequester::find($this->companyColaboratorsArray[$index]['id'])->delete();
            if(!$deletedColaborator){
                session()->flash('error', 'Não foi possível remover o colaborador: \"'. $this->companyColaboratorsArray[$index]['fullname'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                die();
            }
        }
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
            'nif' => 'nullable',
            'email' => 'required|email',
            'firstPurchaseYear' => 'nullable',
            'firstRequestYear' => 'nullable',
            'contactsArray.*.contact' => 'required',
            'addressesArray.*.address' => 'required',
            'companyColaboratorsArray.*.fullname' => 'required',
            'companyColaboratorsArray.*.email' => 'required|email',
        ];
        $messages = [
            'name.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'nif.unique' => FormValidationMessages::existentField('NIF'),
            'email.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'email.email' => FormValidationMessages::INVALID_EMAIL->value,
            'email.unique' => FormValidationMessages::existentField('email'),
            'contactsArray.*.contact.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'addressesArray.*.address.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'companyColaboratorsArray.*.fullname.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'companyColaboratorsArray.*.email.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'companyColaboratorsArray.*.email.email' => FormValidationMessages::INVALID_EMAIL->value,
        ];

        $this->validateFileInputs();
        $this->validate($rules, $messages);
    }

    public function updateOrInsertContacts()
    {
        if(count($this->contactsArray) > 0){
            foreach($this->contactsArray as $contact){
                if(isset($contact['id'])){
                    $theContact = ClientCompanyContact::find($contact['id'])->update([
                        'contact' => $contact['contact']
                    ]);
                    if(!$theContact){
                        session()->flash('error', 'Não foi possível alterar o contacto: \"'. $contact['contact'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }else{
                    $createdContact = ClientCompanyContact::create([
                        'contact' => $contact['contact'],
                        'id_client_company' => $this->id
                    ]);
                    if(!$createdContact){
                        session()->flash('error', 'Não foi possível criar o contacto: \"'. $contact['contact'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }
            }
        }
    }

    private function updateOrInsertAddresses()
    {
        if(count($this->addressesArray) > 0){
            // dd($this->addressesArray);
            foreach($this->addressesArray as $address){
                if(isset($address['id'])){
                    $theAddress = ClientCompanyAddress::find($address['id'])->update([
                        'address' => $address['address']
                    ]);
                    if(!$theAddress){
                        session()->flash('error', 'Não foi possível alterar o endereço: \"'. $address['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }else{
                    $createdAddress = ClientCompanyAddress::create([
                        'address' => $address['address'],
                        'id_client_company' => $this->id
                    ]);
                    if(!$createdAddress){
                        session()->flash('error', 'Não foi possível criar o endereço: \"'. $address['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }
            }
        }
    }

    private function updateOrInsertColaborators()
    {
        if(count($this->companyColaboratorsArray) > 0){
            foreach($this->companyColaboratorsArray as $colaborator){
                if(isset($colaborator['id'])){
                    $theColaborator = ClientColaboratorRequester::find($colaborator['id'])->update([
                        'fullname' => $colaborator['fullname'],
                        'email' => $colaborator['email'],
                        'phone_number1' => $colaborator['phone_number1'],
                        'phone_number2' => $colaborator['phone_number2'],
                        'phone_number3' => $colaborator['phone_number3'],
                    ]);
                    if(!$theColaborator){
                        session()->flash('error', 'Não foi possível alterar o colaborador: \"'. $colaborator['fullname'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }else{
                    $createdColaborator = ClientColaboratorRequester::create([
                        'fullname' => $colaborator['fullname'],
                        'email' => $colaborator['email'],
                        'phone_number1' => $colaborator['phone_number1'],
                        'phone_number2' => $colaborator['phone_number2'],
                        'phone_number3' => $colaborator['phone_number3'],
                        'id_client_company' => $this->id
                    ]);
                    if(!$createdColaborator){
                        session()->flash('error', 'Não foi possível criar o colaborador: \"'. $colaborator['fullname'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('leads::livewire.edit-lead');
    }
}
