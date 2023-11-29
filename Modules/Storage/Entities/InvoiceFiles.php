<?php

namespace Modules\Storage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoices\Entities\Invoice;

class InvoiceFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'id_colaborator',
        'id_invoice'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'id_colaborator', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice', 'id');
    }
}
