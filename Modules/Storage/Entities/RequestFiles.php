<?php

namespace Modules\Storage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Requests\Entities\ClientRequests;

class RequestFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'id_colaborator',
        'id_request'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    }

    public function request()
    {
        return $this->belongsTo(ClientRequests::class, 'id_request', 'id');
    }
    
    
}
