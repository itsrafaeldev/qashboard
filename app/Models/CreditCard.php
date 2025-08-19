<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'closing_day', 'final_numbar', 'user_id'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
