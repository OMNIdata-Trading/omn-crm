<?php

namespace Modules\Requests\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Leads\Entities\ClientColaboratorRequester;

class ClientRequests extends Model
{
    use HasFactory;

    public function clientsColaborators(){
        return $this->belongsToMany(ClientColaboratorRequester::class, 'requester_and_client_requests', 'id_requests', 'id_client_requester');
    }

}
