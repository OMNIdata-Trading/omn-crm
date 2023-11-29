<?php

namespace Modules\Colaborators\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboratorRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_role_classification'
    ];

    public function classification()
    {
        return $this->belongsTo(ColaboratorRoleClassification::class, 'id_role_classification', 'id');
    }

    public function colaborators(){
        return $this->hasMany(Colaborator::class, 'id_colaborator_role', 'id');
    }

}
