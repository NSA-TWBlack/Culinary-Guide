<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Favorites;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRecipesController extends Controller
{
    public function index() {
        $recipes = Recipes::get(['id','title', 'image', 'description', 'created_at']);
        $searchVal = '';
        return view('user.page.recipes.recipes', compact('recipes', 'searchVal'));
    }

    public function detail($id)
    {
        try {
            $recipe = Recipes::find($id);
            $recipe->view = $recipe->view + 1;
            $recipe->save();
            $comments = Comments::join('users', 'users.id', '=', 'comments.id_user')->where('id_recipes', $id)->get(['comments.id', 'comments.content', 'comments.created_at', 'comments.id_user', 'users.name']);
            $favorites = Favorites::where('id_user', Auth::user()->id ?? -1)->get();
            $recipesSimilar = Recipes::where('id_categories', $recipe['id_categories'])->where('id', '!=', $recipe['id'])->get(['id', 'title', 'image'])->take(5);
            return view('user.page.recipes.detail', compact('recipe', 'comments', 'recipesSimilar', 'favorites'));
        } catch (\Throwable $th) {
            return view('error.notfound');
        }
    }

    public function addToFavorite($id, Request $request)
    {
        $recipe = Recipes::find($id);
        $recipe->like = $recipe->like + $request->likeCheck;
        $recipe->view = $recipe->view - 1;
        $recipe->save();
        if ($request->likeCheck > 0) {
            $favorite = new Favorites;
            $favorite->id_user = Auth::user()->id;
            $favorite->id_recipes = $id;
            $favorite->save();
        }
        else {
            $favorite = Favorites::where('id_user', Auth::user()->id)->where('id_recipes', $id);
            $favorite->delete();
        }

        return redirect()->route('recipes.detail', $id);
    }

    public function search(Request $request) {
        $recipes = Recipes::where('title', 'like', '%'.$request->txtSearch.'%')->get(['id','title', 'image', 'description', 'created_at']);
        $searchVal = $request->txtSearch;

        return view('user.page.recipes.recipes', compact('recipes', 'searchVal'));
    }

}
