<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\NewsRequest;
use App\Models\News;
use App\Models\Categories;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::join('categories', 'news.id_categories', '=', 'categories.id')
            ->where('categories.id', '=', 1)
            ->get(
                [
                    'news.id as id',
                    'news.title as title',
                    'categories.title as title_categories',
                    'news.created_at as create',
                    'news.updated_at as update'
                ]
            );

        return view('admin.page.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::where('id', '=', 1)->get();
        return view('admin.page.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;
        $news->title = $request->txtTitle;
        $news->description = $request->txtDescription;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $news->image = $img_name;
        // danh mục mặc định là Tin Tức(id=1)
        $news->id_categories = '1';
        $news->save();
        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.news.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.page.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->txtTitle;
        $news->description = $request->txtDescription;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $news->image = $img_name;
        // danh mục mặc là Tin Tức(id=1)
        $news->id_categories = '1';
        $news->save();
        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.news.index')->with('info', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('admin.news.index')->with('danger', 'Xóa thành công!');
    }
}
