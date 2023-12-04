<?php

namespace Modules\Proposals\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_cost',
        'lead_time',
        'sent_to_client_at',
        'currency',
        'expiration_time',
        'id_proposal'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'id_proposal', 'id');
    }

}
