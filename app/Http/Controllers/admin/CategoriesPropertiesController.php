<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoriesPropertiesRequest;
use App\Models\Categories;
use App\Models\CategoriesProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_properties = CategoriesProperties::join('categories', 'categories_properties.id_categories', '=', 'categories.id')
            ->where('categories.id', '>=', 1)
            ->get(
                [
                    'categories_properties.id as id',
                    'categories_properties.title as title',
                    'categories.title as title_categories',
                    'categories_properties.created_at as create',
                    'categories_properties.updated_at as update'
                ]
            );
        return view('admin.page.categories_properties.index', compact('categories_properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_properties = Categories::where('id','=',1)->get();
        return view('admin.page.categories_properties.create', compact('categories_properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesPropertiesRequest $request)
    {
        $categories_properties = new CategoriesProperties;
        $categories_properties->title = $request->txtTitle;
        $categories_properties->id_categories = $request->txtCategories;
        $categories_properties->save();
        return redirect()->route('admin.categories_properties.index')->with('success', 'Thêm thành công!');
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
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories_properties = CategoriesProperties::find($id);
        $categories =Categories::where('id','=',1)->get();
        return view('admin.page.categories_properties.edit', compact('categories', 'categories_properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @ param  \Illuminate\Http\Request  $request
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function update(CategoriesPropertiesRequest $request, $id)
    {
        $categories_properties = CategoriesProperties::find($id);
        $categories_properties->title = $request->txtTitle;
        $categories_properties->id_categories = $request->txtCategories;
        $categories_properties->save();
        return redirect()->route('admin.categories_properties.index')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesProperties::where('id', $id)->delete();
        return redirect()->route('admin.categories_properties.index')->with('danger', 'Xóa thành công!');
    }
}
