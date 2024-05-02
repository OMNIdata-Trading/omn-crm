<?php

namespace Modules\Requests\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Leads\Entities\ClientColaboratorRequester;
use Modules\Leads\Entities\IndividualClient;
use Modules\Proposals\Entities\Proposal;
use Modules\Quotation\Entities\Quotation;
use Modules\Storage\Entities\RequestFiles;
use Modules\Tasks\Entities\Task;

class ClientRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'description',
        'request_code',
        'requested_at',
        'id_income_method',
        'id_individual_client',
        'treated'
    ];

    public function incomeMethod()
    {
        return $this->belongsTo(RequestIncomeMethod::class, 'id_income_method', 'id');
    }
    
    public function clients()
    {
        return $this->belongsToMany(ClientColaboratorRequester::class, 'requester_and_client_requests', 'id_requests', 'id_client_requester');
    }

    public function individualClient()
    {
        return $this->belongsTo(IndividualClient::class, 'id_individual_client', 'id');
    }

    public function colaborators()
    {
        return $this->belongsToMany(Colaborator::class, 'requests_and_colaborators', 'id_request', 'id_colaborator');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'id_request', 'id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'requests_tasks', 'id_request', 'id_task');
    }

    public function attachments()
    {
        return $this->hasMany(RequestFiles::class, 'id_request', 'id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'id_request', 'id');
    }

}
