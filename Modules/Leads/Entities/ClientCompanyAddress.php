<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'id_client_company'
    ];

    public function company()
    {
        return $this->belongsTo(ClientCompany::class, 'id_client_company', 'id');
    }

}
