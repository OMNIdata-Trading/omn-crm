<?php

namespace Modules\Colaborators\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quotation\Entities\Quotation;
use Modules\Requests\Entities\ClientRequests;
use Modules\Tasks\Entities\Task;
use Modules\Users\Entities\Users;

class Colaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'colaborator_number',
        'phone_number1',
        'phone_number2',
        'id_colaborator_role'
    ];

    public function user()
    {
        return $this->hasOne(Users::class, 'id_colaborator', 'id');
    }

    public function authenticatedUser()
    {
        return $this->hasOne(User::class, 'id_colaborator', 'id');
    }

    public function role()
    {
        return $this->belongsTo(ColaboratorRole::class, 'id_colaborator_role', 'id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'colaborators_tasks', 'id_colaborator', 'id_task');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'requested_by_colab_id', 'id');
    }

    public function requests()
    {
        return $this->belongsToMany(ClientRequests::class, 'requests_and_colaborators', 'id_colaborator', 'id_request');
    }

}
