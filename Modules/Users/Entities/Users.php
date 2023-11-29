<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colaborators\Entities\Colaborator;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'status',
        'id_colaborator'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    }

    public function isActive()
    {
        return ($this->status == 'active') ? true : false;
    }

}
