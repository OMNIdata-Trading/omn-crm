<?php

namespace Modules\Colaborators\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboratorRoleClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->hasMany(ColaboratorRole::class, 'id_role_classification', 'id');
    }

    public function habilities()
    {
        return $this->belongsToMany(ColaboratorRoleHability::class, 'classification_habilities', 'id_colaborator_classification', 'id_colaborator_hability');
    }
}
