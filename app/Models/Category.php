<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = ['category_name', 'description'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function categoriesDefault(User $user){

    }







}
