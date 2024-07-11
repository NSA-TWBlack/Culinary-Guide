<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Recipes;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorite = Favorite::join('users', 'users.id', '=', 'favorite.id_user')
            ->join('recipes', 'recipes.id', '=', 'favorite.id_recipes')
            ->get(['users.name', 'recipes.title', 'favorite.created_at', 'recipes.id']);

       return view('admin.page.favorite.index', compact('favorite'));
    }

    public function destroy($id)
    {
        Favorite::where('id_recipes', $id)->delete();
        $recipe = Recipes::find($id);
        $recipe->like = $recipe->like - 1;
        $recipe->save();
        return redirect()->route('admin.comments.index')->with('danger', 'Xóa thành công!');
    }
}
