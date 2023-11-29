<?php

namespace Modules\Tasks\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Requests\Entities\ClientRequests;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];
    
    public function request()
    {
        return $this->belongsToMany(ClientRequests::class, 'requests_tasks', 'id_task', 'id_request');
    }

    public function colaborator()
    {
        return $this->belongsToMany(Colaborator::class, 'colaborators_tasks', 'id_task', 'id_colaborator');
    }
}
