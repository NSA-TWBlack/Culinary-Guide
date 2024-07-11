<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProperties extends Model
{
    use HasFactory;
    protected $table = 'categories_properties';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'created_at', 'updated_at', 'id_categories'];
}
