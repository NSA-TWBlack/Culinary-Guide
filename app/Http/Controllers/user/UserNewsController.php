<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class UserNewsController extends Controller
{
    public function index() {
        $news = News::get(['id', 'title', 'description', 'image']);
        $searchVal = '';
        return view('user.page.news.news', compact('news', 'searchVal'));
    }


    public function detail($id) {
        $news = News::find($id);
        $news->view = $news->view + 1;
        $news->save();
        $newsLatest = News::orderBy('created_at', 'DESC')->where('id', '!=', $news['id'])->get(['id', 'title', 'image'])->take(7);
        return view('user.page.news.detail', compact('news', 'newsLatest'));
    }

    public function search(Request $request) {
        $news = News::where('title', 'like', '%'.$request->txtSearch.'%')->get(['id','title', 'image', 'description', 'created_at']);
        $searchVal = $request->txtSearch;
        return view('user.page.news.news', compact('news', 'searchVal'));
    }
}
