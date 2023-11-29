<?php

namespace Modules\Storage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Proposals\Entities\Proposal;

class ProposalFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'id_colaborator',
        'id_proposal'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'id_proposal', 'id');
    }
}
