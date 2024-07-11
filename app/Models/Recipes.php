<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'view', 'like'];

    
    // public function recipesProperties(){
    //     return $this->hasOne(Categories_properties::class, 'id', 'id_propertiescategories');
    // }

    // public function recipesCategories(){
    //     return $this->hasOne(Categories::class, 'id', 'id_categories');
    // }

    // public function recipesUsers(){
    //     return $this->hasOne(User::class, 'id', 'tacgia');
    // }


    // public function recipesComments(){
    //     return $this->hasMany(Comments::class, 'id_recipes', 'id');
    // }
}
