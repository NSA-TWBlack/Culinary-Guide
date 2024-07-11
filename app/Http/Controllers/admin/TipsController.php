<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TipsRequest;
use App\Models\Tips;
use App\Models\Categories;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tips::join('categories', 'tips.id_categories', '=', 'categories.id')
            ->where('categories.id', '=', 2)
            ->get(
                [
                    'tips.id as id',
                    'tips.title as title',
                    'categories.title as title_categories',
                    'tips.created_at as create',
                    'tips.updated_at as update'
                ]
            );

        return view('admin.page.tips.index', compact('tips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.tips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipsRequest $request)
    {
        $tips = new Tips;
        $tips->title = $request->txtTitle;
        $tips->description = $request->txtDescription;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $tips->image = $img_name;
        // danh mục mặc là Mẹo Vặt(id=0)
        $tips->id_categories = '2';
        $tips->save();
        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.tips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tips = Tips::find($id);
        return view('admin.page.tips.edit', compact('tips'))->with('success', 'Thêm thành công!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipsRequest $request, $id)
    {
        $tips = Tips::find($id);
        $tips->title = $request->txtTitle;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $tips->image = $img_name;
        // danh mục mặc là Mẹo Vặt(id=0)
        $tips->id_categories = '0';
        $tips->save();
        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.tips.index')->with('info', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tips::where('id', $id)->delete();
        return redirect()->route('admin.tips.index')->with('danger', 'Xóa thành công!');
    }
}
