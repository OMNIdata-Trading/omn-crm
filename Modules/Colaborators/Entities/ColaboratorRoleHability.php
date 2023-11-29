<?php

namespace Modules\Colaborators\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboratorRoleHability extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'can_see_business',
        'can_create_business',
        'can_edit_business',
        'can_delete_business',
        'can_see_leads',
        'can_create_leads',
        'can_edit_leads',
        'can_delete_leads',
        'can_see_users',
        'can_create_users',
        'can_edit_users',
        'can_see_colaborators',
        'can_create_colaborators',
        'can_edit_colaborators',
        'can_delete_colaborators',
        'can_see_files',
        'can_create_files',
        'can_edit_files',
        'can_delete_files'
    ];

    public function classification(){
        return $this->belongsToMany(ColaboratorRoleClassification::class, 'classification_habilities', 'id_colaborator_hability', 'id_colaborator_classification');
    }

}
