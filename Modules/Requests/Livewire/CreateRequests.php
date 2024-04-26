<?php

namespace Modules\Requests\Livewire;

use App\Core\Interfaces\WithValidInputs;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\ClientCompany;
use Modules\Requests\Entities\ClientRequests;
use Modules\Requests\Entities\RequestIncomeMethod;
use Modules\Storage\Entities\RequestFiles;
use Modules\Tasks\Entities\Task;


class CreateRequests extends Component implements WithValidInputs
{
    use WithFileUploads;

    #[Rule('required')]
    public $registeredClientCompanies;
    #[Rule('required')]
    public $clientCompanyColaborators;
    #[Rule('required')]
    public $order;
    public $incomeMethods;

    public $requestCode;
    #[Rule('required')]

    public $requestDate;
    private $requestYear;
    
    public $allColaborators;
    public $description;
    public $hasTasks = false;
    public $tasks;

    #[Rule(['attachments.*' => 'file|mimes:pdf,txt,docx,xlsx|max:102400'])] // max 100KB
    public $attachments;
    public $attachmentsDescriptions;
    
    //
    public $selectedIncomeMethod;
    public $idSelectedCompany;
    public $selectedCompany;
    public $idClientColaborator;
    public $selectedClientColaborator;
    public $selectedColaborators;

    public $hasSingularClient;


    public $count = 0;

    // events
    protected $listeners = [
        'addedNewClient' => 'getClientCompanies',
        'changeDetectedOnClient' => 'changeDetectedOnClientColaboratorSelect'
    ];

    public function validateInputs(): void{}

    public function mount(){
        $this->getClientCompanies();
        $this->clientCompanyColaborators = [];

        $this->incomeMethods = RequestIncomeMethod::all();

        $this->allColaborators = Colaborator::get();
        $this->selectedColaborators = [];

        $this->attachments = [];
        $this->attachmentsDescriptions = [];
        $this->tasks = [];

        $this->verifyClientsWithoutCompany();
    }

    public function verifyClientsWithoutCompany()
    {
        $existsClientWithoutCompany = ClientColaboratorRequester::where('id_client_company', null)->get();
        if($existsClientWithoutCompany->count() > 0){
            $this->hasSingularClient = true;
        }else{
            $this->hasSingularClient = false;
        }
    }

    public function getClientCompanies(){
        $this->registeredClientCompanies = ClientCompany::get();
        $this->verifyClientsWithoutCompany();
    }

    public function changeDetectedOnCompanySelect(){
        
        $this->idClientColaborator = null;
        
        if(!empty($this->idSelectedCompany) || $this->idSelectedCompany == 0){

            if($this->idSelectedCompany == 0){
                $this->requestCode = '';
            }
            $this->dispatch('companySelectHasChanged');
            $this->getColaboratorsOfCompany();
            $this->generateRequestCode();
            
        }else{
            $this->clientCompanyColaborators = [];
        }
        
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

        $this->regenerateRequestCode();
    }

    public function getColaboratorsOfCompany(){
        if($this->idSelectedCompany != 0){
            $this->selectedCompany = ClientCompany::find($this->idSelectedCompany);
            $this->clientCompanyColaborators = $this->selectedCompany->colaborators;
            return;
        }

        $this->requestCode = '';
        $this->clientCompanyColaborators = ClientColaboratorRequester::where('id_client_company', null)->get();
        $this->idClientColaborator = null;
        // $this->dispatch('changeDetectedOnClient');
    }

    public function changeDetectedOnClientColaboratorSelect(){
        if($this->idSelectedCompany == 0){
            $this->selectedClientColaborator = ClientColaboratorRequester::find($this->idClientColaborator);
            $this->generateRequestCodeForSingularClients();
        }
    }

    private function regenerateRequestCode()
    {
        if($this->selectedCompany != null && $this->idSelectedCompany != 0){
            $this->generateRequestCode();

        }elseif($this->idSelectedCompany == 0 && $this->clientCompanyColaborators != null && $this->selectedCompany == null){
            $this->generateRequestCodeForSingularClients();
        }
    }

    private function generateRequestCode(){

        if($this->selectedCompany != null && $this->idSelectedCompany != 0){

            $generatedCode = '';
            $companyName = '';
            $totalOfRequestsFromCompany = 0;

            $companyName = $this->selectedCompany->name;
            $nameExploded = explode(' ', $companyName);

            foreach($this->clientCompanyColaborators as $clientColaborator){
                $totalOfRequestsFromCompany += $clientColaborator->requests()->whereYear('requested_at', ($this->requestYear ?? date('Y')))->count();
            }
    
            $theNextRequestCodeOrder = $totalOfRequestsFromCompany + 1;
            $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) . "-RQ-$theNextRequestCodeOrder/".($this->requestYear ?? date('Y'));
            
            $this->requestCode = $generatedCode;
        }
    }

    private function generateRequestCodeForSingularClients(){
        $this->selectedCompany = null;

        if($this->clientCompanyColaborators != null && $this->selectedCompany == null){

            $generatedCode = '';
            $totalOfRequestsFromSingularClient = 0;
            $clientColaboratorName = $this->selectedClientColaborator->fullname;
            $nameExploded = explode(' ', $clientColaboratorName);
    
            $totalOfRequestsFromSingularClient += $this->selectedClientColaborator->requests()->whereYear('requested_at', ($this->requestYear ?? date('Y')))->count();
    
            $theNextRequestCodeOrder = $totalOfRequestsFromSingularClient + 1;
            $generatedCode = str_replace(' ', '_', removeAccent(strtoupper($nameExploded[0]))) .'-'. str_replace(' ', '_', removeAccent(strtoupper($nameExploded[1]))) . "-RQ-$theNextRequestCodeOrder/".($this->requestYear ?? date('Y'));
            
            $this->requestCode = $generatedCode;
        }

    }

    public function addSelectedColaborator(Colaborator $colaborator)
    {
        if(key_exists($colaborator->id, $this->selectedColaborators)){
            unset($this->selectedColaborators[$colaborator->id]);
            return;
        }
        $this->selectedColaborators[$colaborator->id] = $colaborator;
    }

    public function showTasksArea(){
        $this->hasTasks = !$this->hasTasks;

        if($this->hasTasks){
            $this->tasks[] = [
                'colaborators' => [],
                'description' => ''
            ];

        }else{
            $this->tasks = [];
        }
    }

    public function addTask(){
        $this->tasks[] = [
            'colaborators' => [],
            'description' => ''
        ];
    }

    public function removeTask($index){
        unset($this->tasks[$index]);
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

    public function store(){

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
            'id_income_method' => $this->selectedIncomeMethod
        ]);

        if(!$latestRequest){
            session()->flash('error', 'Não foi possível adicionar esta solicitação. Tente novamente, caso o erro persitir contacte à área de suporte do sistema');
            return;
        }

        // relation with client
        ClientRequests::find($latestRequest->id)->clients()->attach($this->idClientColaborator);

        // relation with colaborators
        foreach($this->selectedColaborators as $colaborator){
            ClientRequests::find($latestRequest->id)->colaborators()->attach($colaborator->id);
        }

        if(count($this->attachments) > 0){

            $clientName = ClientRequests::find($latestRequest->id)->clients->where('id', $this->idClientColaborator)->first()->company->name ??
                      ClientRequests::find($latestRequest->id)->clients->where('id', $this->idClientColaborator)->first()->fullname;

            //
            
            $day = date('d');
            $month = date('M');
            $year = date('Y');

            foreach($this->attachmentsDescriptions as $key => $attachmentDesctiption){
                $file_path = $this->attachments[$key]->store("requests/$clientName/$year/$month/$day", 'public');

                RequestFiles::create([
                    'file_name' => $attachmentDesctiption['file_name'],
                    'file_path' => $file_path,
                    'id_request' => $latestRequest->id,
                    'id_colaborator' => Auth::user()->colaborator->id
                ]);
            }
        }

        if(count($this->tasks) > 0){
            foreach($this->tasks as $task){
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
