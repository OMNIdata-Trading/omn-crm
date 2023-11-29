<?php

namespace Modules\Storage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Quotation\Entities\Quotation;

class QuotationFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'id_colaborator',
        'id_quotation'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'id_quotation', 'id');
    }
}
