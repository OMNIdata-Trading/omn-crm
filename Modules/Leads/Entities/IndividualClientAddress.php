<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndividualClientAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'id_individual_client'
    ];

    public function owner()
    {
        return $this->belongsTo(IndividualClient::class, 'id_individual_client', 'id');
    }
}
