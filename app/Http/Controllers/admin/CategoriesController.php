<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoriesRequest;
use Illuminate\Http\Request;
use App\Models\Categories; //add Categories Model - Data is coming from the database via Model.
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        // lấy toàn bộ categories trừ 'tin tức' và 'mẹo vặt'
        $categories = Categories::where('id', '>=', 1)->orderBy('id', 'ASC')->get();

        return view('admin.page.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $categories = new Categories;
        $categories->title = $request->txtTitle;

        $categories->save();
        return redirect()->route('admin.categories.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('admin.page.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $categories = Categories::find($id);
        $categories->title = $request->txtTitle;
        $categories->update();

        return redirect()->route('admin.categories.index')->with('warning', 'Sửa thành công!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('admin.categories.index')->with('danger', 'Xóa thành công!');
    }
}
