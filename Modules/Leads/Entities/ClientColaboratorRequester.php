<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Requests\Entities\ClientRequests;

class ClientColaboratorRequester extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'email',
        'phone_number1',
        'phone_number2',
        'phone_number3',
        'first_purchase_year',
        'status',
        'id_client_company'
    ];

    public function company(){
        return $this->belongsTo(ClientCompany::class, 'id_client_company', 'id');
    }

    public function requests(){
        return $this->belongsToMany(ClientRequests::class, 'requester_and_client_requests', 'id_client_requester', 'id_requests');
    }

}
