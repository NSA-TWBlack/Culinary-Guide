<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Recipes;
use App\Models\Tips;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipes = Recipes::get(['id','title','image'])->take(10);
        $tips = Tips::get(['id', 'title'])->take(6);
        $news = News::orderBy('created_at', 'DESC')->get(['id', 'title', 'image'])->take(4);
        return view('index', compact('recipes','tips', 'news'));
    }
}
