<?php

namespace Modules\Quotation\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Requests\Entities\ClientRequests;
use Modules\Storage\Entities\QuotationFiles;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor',
        'delivery_time',
        'requested_at',
        'responsed_at',
        'id_request',
        'requested_by_colab_id'
    ];

    public function request()
    {
        return $this->belongsTo(ClientRequests::class, 'id_request', 'id');
    }

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class, 'requested_by_colab_id', 'id');
    }

    public function file()
    {
        return $this->hasOne(QuotationFiles::class, 'id_quotation', 'id');
    }

}
