<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Category, Transaction, Installment};
class Registry extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryFactory> */
    use HasFactory;
    protected $fillable = ['registry_name', 'status', 'registry_date', 'category_id', 'transaction_id', 'description'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function category()
    {
        return $this->belongsTo(Category::class); // registry.category_id → categories.id
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class, 'registry_id');
    }


}
