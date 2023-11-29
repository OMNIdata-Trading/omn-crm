<?php

namespace Modules\Proposals\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Requests\Entities\ClientRequests;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'order_number',
        'proposal_code',
        'description',
        'year',
        'id_request',
        'kind',
        'status'
    ];

    public function request()
    {
        return $this->belongsTo(ClientRequests::class, 'id_request', 'id');
    }

    public function proposal_details()
    {
        return $this->hasMany(ProposalDetail::class, 'id_proposal', 'id');
    }

}
