<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Registry extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryFactory> */
    use HasFactory;
    protected $fillable = ['registry_name', 'status', 'registry_date', 'amount', 'quantity_installment', 'current_installment', 'description'
    // 'category_id', 'transaction_id'
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';







}
