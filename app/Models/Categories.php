<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // public function categoriesProperties(){
    //     return $this->hasMany(Categories_properties::class, 'id_categories', 'id');
    // }

    // public function categoriesRecipes(){
    //     return $this->hasMany(Recipes::class, 'id_categories', 'id');
    // }

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'created_at', 'updated_at'];
}
