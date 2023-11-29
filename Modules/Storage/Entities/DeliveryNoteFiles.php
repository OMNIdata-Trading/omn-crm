<?php

namespace Modules\Storage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryNoteFiles extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'file_name',
    //     'file_path',
    //     'file_type',
    //     'id_colaborator',
    //     'id_delivery_note'
    // ];

    // public function colaborator()
    // {
    //     return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    // }

    // public function proposal()
    // {
    //     return $this->belongsTo(Proposal::class, 'id_proposal', 'id');
    // }
}
