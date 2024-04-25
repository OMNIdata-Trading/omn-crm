<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Requests\Entities\ClientRequests;

class IndividualClient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'logo_path',
        'nif',
        'website',
        'email',
        'first_purchase_year',
        'first_request_year',
        'status'
    ];

    public function requests(){
        return $this->hasMany(ClientRequests::class, 'id_individual_client', 'id'); 
    }

    public function addresses()
    {
        return $this->hasMany(IndividualClientAddress::class, 'id_individual_client', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(IndividualClientContact::class, 'id_individual_client', 'id');
    }
    
}
