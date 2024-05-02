<?php

namespace Modules\Requests\Livewire;

use App\Core\Enums\ClientTypeEnum;
use App\Core\Interfaces\WithValidFileInputs;
use App\Core\Interfaces\WithValidInputs;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Leads\Entities\IndividualClient;
use Modules\Requests\Entities\ClientRequests;
use Modules\Requests\Entities\RequestIncomeMethod;
use Modules\Storage\Entities\RequestFiles;
use Modules\Tasks\Entities\Task;


class CreateRequests extends Component implements WithValidInputs, WithValidFileInputs
{
    use WithFileUploads;

    public $clientType;

    public $clientCompaniesArray;
    public $clientCompanyColaboratorsArray;

    public $individualClientsArray;
    public int $selectedIndividualClient;

    public string $order;
    public Collection $incomeMethodsArray;

    public string $requestCode;

    public string $requestDate;
    private $requestYear;
    
    public Collection $colaboratorsArray;
    public string $description;
    public bool $hasTasks = false;
    public array $tasksArray;

    public array $attachmentsArray;
    public array $attachmentsDescriptionsArray;
    
    //
    public int | null $selectedIncomeMethod; // id
    public int | null $selectedClientCompany; // id
    public ClientCompany $selectedClientCompanyData; // ClientCompany
    public IndividualClient $selectedIndividualClientData;
    public int | null $selectedClientCompanyColaborator; // id
    public array $selectedInternalColaboratorsToRequest; // Colaborators[]

    // events
    protected $listeners = [
        'changeDetectedOnClient' => 'changeDetectedOnClientColaboratorSelect'
    ];

    public function mount(){
        $this->clientType = ClientTypeEnum::COMPANY->value;
        
        $this->clientCompaniesArray = $this->getClientCompanies();
        $this->individualClientsArray = $this->getIndividualClients();

        $this->clientCompanyColaboratorsArray = [];

        $this->incomeMethodsArray = RequestIncomeMethod::get();

        $this->colaboratorsArray = Colaborator::get();
        $this->selectedInternalColaboratorsToRequest = [];

        $this->attachmentsArray = [];
        $this->attachmentsDescriptionsArray = [];
        $this->tasksArray = [];

    }

    public function validateInputs(): void{}

    public function validateFileInputs(): void{}


    public function getClientCompanies()
    {
        return ClientCompany::get();
    }

    public function getIndividualClients()
    {
        return IndividualClient::get();
    }

    public function detectChangeInClientCompanySelect()
    {
        $this->selectedClientCompanyColaborator = null;
        $this->selectedClientCompanyData = ClientCompany::find($this->selectedClientCompany);
        $this->clientCompanyColaboratorsArray = $this->getColaboratorsFromSelectedClientCompany($this->selectedClientCompanyData);
        $this->generateRequestCode($this->selectedClientCompanyData);
    }

    public function getColaboratorsFromSelectedClientCompany(ClientCompany $client)
    {
        return $client->colaborators;
    }

    public function detectChangesOnIndividualClientSelect()
    {
        $this->selectedIndividualClientData = IndividualClient::find($this->selectedIndividualClient);
        $this->generateRequestCodeForIndividualClients($this->selectedIndividualClientData);
    }

    public function getYearFromRequestDate()
    {

        if(empty($this->requestDate)){
            $this->requestYear = null;
            return;
        }
        $dateObject = DateTime::createFromFormat('Y-m-d', $this->requestDate);
        if(!$dateObject){
            $this->requestYear = null;
            return;
        }
        $this->requestYear = $dateObject->format('Y');

        if($this->clientType === ClientTypeEnum::COMPANY->value){
            $this->regenerateRequestCode($this->selectedClientCompanyData);
        }else{
            $this->regenerateIndividualRequestCode($this->selectedIndividualClientData);
        }
    }

    private function regenerateRequestCode(ClientCompany $client)
    {
        $this->generateRequestCode($client);
    }

    private function regenerateIndividualRequestCode(IndividualClient $client)
    {
        $this->generateRequestCodeForIndividualClients($client);
    }

    private function generateRequestCode(ClientCompany $client)
    {
        $generatedCode = '';
        $companyName = '';
        $totalOfRequestsFromCompany = 0;

        $companyName = $client->name;
        $nameExploded = explode(' ', $companyName);

        foreach($this->clientCompanyColaboratorsArray as $clientColaborator){
            $totalOfRequestsFromCompany += $clientColaborator->requests()->whereYear('requested_at', ($this->requestYear ?? date('Y')))->count();
        }

        $theNextRequestCodeOrder = $totalOfRequestsFromCompany + 1;
        $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) . "-RQ-$theNextRequestCodeOrder/".($this->requestYear ?? date('Y'));
        
        $this->requestCode = $generatedCode;
    }

    private function generateRequestCodeForIndividualClients(IndividualClient $client)
    {
            $generatedCode = '';
            $totalOfRequestsFromIndividualClient = 0;
            $clientName = $client->fullname;
            $nameExploded = explode(' ', $clientName);
    
            $totalOfRequestsFromIndividualClient += $client->requests()->whereYear('requested_at', ($this->requestYear ?? date('Y')))->count();
    
            $theNextRequestCodeOrder = $totalOfRequestsFromIndividualClient + 1;
            $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) .'-'. str_replace(' ', '_', removeAccent(strtoupper($nameExploded[1]))) . "-RQ-$theNextRequestCodeOrder/".($this->requestYear ?? date('Y'));
            
            $this->requestCode = $generatedCode;

    }

    public function selectColaboratorToRequest(Colaborator $colaborator)
    {
        if(key_exists($colaborator->id, $this->selectedInternalColaboratorsToRequest)){
            unset($this->selectedInternalColaboratorsToRequest[$colaborator->id]);
            return;
        }
        $this->selectedInternalColaboratorsToRequest[$colaborator->id] = $colaborator;
    }

    public function showTasksArea()
    {
        $this->hasTasks = !$this->hasTasks;

        if($this->hasTasks){
            $this->tasksArray[] = [
                'colaborators' => [],
                'description' => ''
            ];

        }else{
            $this->tasksArray = [];
        }
    }

    public function addTask()
    {
        $this->tasksArray[] = [
            'colaborators' => [],
            'description' => ''
        ];
    }

    public function removeTask($index)
    {
        unset($this->tasksArray[$index]);
    }

    public function addAttachment()
    {
        $this->attachmentsDescriptionsArray[] = [
            'file_name',
        ];
    }

    public function removeAttachment($index)
    {
        unset($this->attachments[$index]);
        unset($this->attachmentsDescriptionsArray[$index]);
    }

    public function validateDescription()
    {
        $this->validate([
            'description' => 'max:500'
        ],
        [
            'description.max' => 'A descrição não pode ter mais de :max caracteres'
        ]);
    }

    public function store()
    {

        $requestCodeExistent = ClientRequests::where('request_code', $this->requestCode)->get()->count();
        if($requestCodeExistent > 0){
            session()->flash("error", "Código de solicitação já existente");
            return;
        }

        $latestRequest = ClientRequests::create([
            'order' => $this->order,
            'description' => $this->description,
            'request_code' => $this->requestCode,
            'requested_at' => $this->requestDate,
            'id_income_method' => $this->selectedIncomeMethod,
            'id_individual_client' => ($this->clientType === ClientTypeEnum::COMPANY->value) ? null : $this->selectedIndividualClient
        ]);

        if(!$latestRequest){
            session()->flash('error', 'Não foi possível adicionar esta solicitação. Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        // relation with client
        if($this->clientType === ClientTypeEnum::COMPANY->value){
            ClientRequests::find($latestRequest->id)->clients()->attach($this->selectedClientCompanyColaborator);
        
        }

        // relation with colaborators
        foreach($this->selectedInternalColaboratorsToRequest as $colaborator){
            ClientRequests::find($latestRequest->id)->colaborators()->attach($colaborator->id);
        }

        if(count($this->attachmentsArray) > 0){

            if($this->clientType === ClientTypeEnum::COMPANY->value){
                $clientName = ClientRequests::find($latestRequest->id)->clients->where('id', $this->selectedClientCompanyColaborator)->first()->company->name;
            }else{
                $clientName = ClientRequests::find($latestRequest->id)->individualClient->where('id', $this->selectedIndividualClient)->first()->fullname;   
            }

            //
            
            $day = date('d');
            $month = date('M');
            $year = date('Y');

            foreach($this->attachmentsDescriptionsArray as $key => $attachmentDesctiption){
                $file_path = $this->attachmentsArray[$key]->store("requests/$clientName/$year/$month/$day", 'public');

                RequestFiles::create([
                    'file_name' => $attachmentDesctiption['file_name'],
                    'file_path' => $file_path,
                    'id_request' => $latestRequest->id,
                    'id_colaborator' => Auth::user()->colaborator->id
                ]);
            }
        }

        if(count($this->tasksArray) > 0){
            foreach($this->tasksArray as $task){
                $latestTask = Task::create([
                    'description' => $task['description']
                ]);
                if(!$latestTask){
                    session()->flash('error', 'Não foi possível criar a tarefa \"'. $task['description'] .'\". Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
                    return;
                }

                // relation bwtween request and task
                ClientRequests::find($latestRequest->id)->tasks()->attach($latestTask->id);

                // relation between task and colaborators
                foreach($task['colaborators'] as $colaboratorId){
                    Task::find($latestTask->id)->colaborator()->attach($colaboratorId);
                }
            }
        }
        
        return redirect()->route('account.business.requests.index')->with('success', 'Solicitação criada com êxito');
    }

    public function render()
    {
        return view('requests::livewire.create-requests');
    }
}
