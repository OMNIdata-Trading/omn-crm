<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCompany extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'logo_path',
        'nif',
        'website',
        'company_email',
        'activity_area',
        'first_purchase_year',
        'first_request_year',
        'status'
    ];

    public function colaborators()
    {
        return $this->hasMany(ClientColaboratorRequester::class, 'id_client_company', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(ClientCompanyAddress::class, 'id_client_company', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(ClientCompanyContact::class, 'id_client_company', 'id');
    }

    public function whatAmI()
    {
        return $this->status;
    }

}
