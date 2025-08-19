<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = [
        'amount',
        'quantity_installment',
        'current_installment',
        'registry_id',
        'status',
        'payment_date',
        'competence'

    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function registry()
    {
        return $this->belongsTo(Registry::class, 'registry_id');
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? 'Pago' : 'Pendente';
    }

}
