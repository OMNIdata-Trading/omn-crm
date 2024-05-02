<?php

namespace Modules\Leads\Livewire;

use App\Core\Enums\FormValidationMessages;
use App\Core\Interfaces\WithValidFileInputs;
use App\Core\Interfaces\WithValidInputs;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Leads\Entities\IndividualClient;
use Illuminate\Support\Str;
use Modules\Leads\Entities\IndividualClientAddress;
use Modules\Leads\Entities\IndividualClientContact;

class EditIndividualLead extends Component implements WithValidInputs, WithValidFileInputs
{
    use WithFileUploads;

    public $client;

    public $id;
    public $fullname;
    public $nif;
    public $logo;
    public $registeredLogo;
    public $firstPurchaseYear;
    public $firstRequestYear;
    public $website;
    public $email;
    public $contactsArray;
    public $addressesArray;

    public function mount()
    {
        $this->client = $this->getClientById($this->id);
        
        $this->fullname = $this->client->fullname;
        $this->nif = $this->client->nif;
        $this->registeredLogo = $this->client->logo_path;
        $this->firstPurchaseYear = $this->client->first_purchase_year;
        $this->firstRequestYear = $this->client->first_request_year;
        $this->website = $this->client->website;
        $this->email = $this->client->email;
        $this->contactsArray = $this->client->contacts->toArray();
        $this->addressesArray = $this->client->addresses->toArray();

    }

    private function getClientById(int $id)
    {
        return IndividualClient::find($id);
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

        $sluggedName = Str::slug($this->fullname);
        if($this->logo){
            $logo_path = $this->logo->store("clients/$sluggedName/logo/$year", 'public');
        }else{
            $logo_path = $this->registeredLogo;
        }

        $updatedClient = IndividualClient::find($this->id)->update([
            'fullname' => $this->fullname,
            'nif' => $this->nif,
            'logo_path' => $logo_path,
            'website' => $this->website,
            'email' => $this->email,
            'first_purchase_year' => $this->firstPurchaseYear,
            'first_request_year' => $this->firstRequestYear,
            'status' => (!is_null($this->firstPurchaseYear)) ? 2 : 1
        ]);

        if(!$updatedClient){
            session()->flash('error', 'Não foi possível editar o cliente \"'. $this->fullname .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        $this->updateOrInsertContacts();
        $this->updateOrInsertAddresses();

        return redirect()->route('account.leads.individuals.index')->with('success', (($this->client->whatAmI() === "lead") ? 'Lead' : 'Cliente') . " alterado com êxito.");
    
    }

    public function addContact()
    {
        $this->contactsArray[]['contact'] = '';
    }

    public function addAddress()
    {
        $this->addressesArray[]['address'] = '';
    }

    public function removeContact(int $index)
    {
        if(isset($this->contactsArray[$index]['id'])){
            $deletedContact = IndividualClientContact::find($this->contactsArray[$index]['id'])->delete();
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
            $deletedAddress = IndividualClientAddress::find($this->addressesArray[$index]['id'])->delete();
            if(!$deletedAddress){
                session()->flash('error', 'Não foi possível remover o endereço: \"'. $this->addressesArray[$index]['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                die();
            }
        }

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
            'nif' => 'nullable',
            'email' => 'required|email',
            'firstPurchaseYear' => 'nullable',
            'firstRequestYear' => 'nullable',
            'contactsArray.*.contact' => 'required',
            'addressesArray.*.address' => 'required',
        ];
        $messages = [
            'fullname.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'nif.unique' => FormValidationMessages::existentField('NIF'),
            'email.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'email.email' => FormValidationMessages::INVALID_EMAIL->value,
            'email.unique' => FormValidationMessages::existentField('email'),
            'contactsArray.*.contact.required' => FormValidationMessages::REQUIRED_FIELD->value,
            'addressesArray.*.address.required' => FormValidationMessages::REQUIRED_FIELD->value,
        ];

        $this->validateFileInputs();
        $this->validate($rules, $messages);
    }

    public function updateOrInsertContacts()
    {
        if(count($this->contactsArray) > 0){
            foreach($this->contactsArray as $contact){
                if(isset($contact['id'])){
                    $theContact = IndividualClientContact::find($contact['id'])->update([
                        'contact' => $contact['contact']
                    ]);
                    if(!$theContact){
                        session()->flash('error', 'Não foi possível alterar o contacto: \"'. $contact['contact'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }else{
                    $createdContact = IndividualClientContact::create([
                        'contact' => $contact['contact'],
                        'id_individual_client' => $this->id
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
            foreach($this->addressesArray as $address){
                if(isset($address['id'])){
                    $theAddress = IndividualClientAddress::find($address['id'])->update([
                        'address' => $address['address']
                    ]);
                    if(!$theAddress){
                        session()->flash('error', 'Não foi possível alterar o endereço: \"'. $address['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }else{
                    $createdAddress = IndividualClientAddress::create([
                        'address' => $address['address'],
                        'id_individual_client' => $this->id
                    ]);
                    if(!$createdAddress){
                        session()->flash('error', 'Não foi possível criar o endereço: \"'. $address['address'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                        die();
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('leads::livewire.edit-individual-lead');
    }
}
