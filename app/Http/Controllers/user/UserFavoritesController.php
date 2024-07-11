<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller
{
    public function index() {
        $recipes = Favorites::join('recipes', 'recipes.id', '=', 'favorite.id_recipes')->where('id_user', Auth::user()->id)->get(['recipes.id', 'recipes.title', 'recipes.image', 'recipes.description']);
        $searchVal = '';
        return view('user.page.favorites.favorites', compact('recipes', 'searchVal'));
    }

    public function search() {

    }
}
