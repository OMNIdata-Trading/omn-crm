<?php

namespace Modules\Requests\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestIncomeMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    public function requests()
    {
        return $this->hasMany(ClientRequests::class, 'id_income_method', 'id');
    }

}
