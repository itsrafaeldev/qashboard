<?php

namespace App\Models;

use App\Models\Registry;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function registries()
    {
        return $this->hasMany(Registry::class);
    }
}
