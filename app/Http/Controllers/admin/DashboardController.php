<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Recipes;
use App\Models\Tips;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $recipe_quantity = Recipes::all()->count();

        $tip_quantity = Tips::all()->count();

        $news_quantity = News::all()->count();

        $user_quantity = User::all()->where('typeuser', 2)->count();
        
        for ($i = 1; $i <= 12; $i++) {
            $month[$i] = User::where('typeuser', 2)
                            ->whereYear('created_at', '=', date("Y"))
                            ->whereMonth('created_at', '=', $i)
                            ->count();
        }
        return view('admin.dashboard', compact('recipe_quantity', 'tip_quantity', 'news_quantity', 'user_quantity', 'month'));
    }
}
