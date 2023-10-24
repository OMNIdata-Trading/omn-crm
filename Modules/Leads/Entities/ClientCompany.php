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
        'status'
    ];

    public function colaborators(){
        return $this->hasMany(ClientColaboratorRequester::class, 'id_client_company', 'id');
    }
}
