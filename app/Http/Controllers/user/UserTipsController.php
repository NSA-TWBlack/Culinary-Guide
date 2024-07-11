<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Tips;
use Illuminate\Http\Request;

class UserTipsController extends Controller
{
    public function index() {
        $tips = Tips::get(['id', 'title', 'description', 'image']);
        $searchVal = '';
        return view('user.page.tips.tips', compact('tips', 'searchVal'));
    }

    public function detail($id) {
        $tip = Tips::find($id);
        $tip->view = $tip->view + 1;
        $tip->save();
        $tipsLatest = Tips::orderBy('created_at', 'DESC')->where('id', '!=', $tip['id'])->get(['id', 'title', 'image'])->take(5);

        return view('user.page.tips.detail', compact('tip', 'tipsLatest'));
    }

    public function search(Request $request) {
        $tips = Tips::where('title', 'like', '%'.$request->txtSearch.'%')->get(['id','title', 'image', 'description', 'created_at']);
        $searchVal = $request->txtSearch;
        return view('user.page.tips.tips', compact('tips', 'searchVal'));
    }
}
