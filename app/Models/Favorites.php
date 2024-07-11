<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorite';

    protected $primaryKey = ['id_user', 'id_recipes'];

    public $incrementing = false;
}
