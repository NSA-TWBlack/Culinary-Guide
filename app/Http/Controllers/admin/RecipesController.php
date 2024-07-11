<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RecipesRequest;
use App\Models\Categories;
use App\Models\CategoriesProperties;
use App\Models\Favorites;
use App\Models\Feedbacks;
use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::join('categories_properties', 'recipes.id_categories', '=', 'categories_properties.id')
            ->where('categories_properties.id', '>=', 1)
            ->get(
                [
                    'recipes.id as id',
                    'recipes.title as title',
                    'categories_properties.title as title_categories',
                    'recipes.created_at as create',
                    'recipes.updated_at as update'
                ]
            );

        return view('admin.page.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @ return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriesProperties::all();
        return view('admin.page.recipes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @ param  \Illuminate\Http\Request  $request
     * @ return \Illuminate\Http\Response
     */
    public function store(RecipesRequest $request)
    {

        $recipes = new Recipes;
        $recipes->title = $request->txtTitle;
        $recipes->description = $request->txtDescription;
        $recipes->ingredients = $request->txtIngredients;
        $recipes->steps = $request->txtSteps;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $recipes->image = $img_name;
        $recipes->id_categories = $request->txtCategories;

        $recipes->save();

        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.recipes.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipes = Recipes::find($id);
        return view('admin.page.recipes.show', compact('recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @ param  int  $id
     * @ return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipes = Recipes::find($id);
        $categories = CategoriesProperties::where('id', '>', -1)->get();

        return view('admin.page.recipes.edit', compact('recipes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipesRequest $request, $id)
    {
        $recipes = Recipes::find($id);
        $recipes->title = $request->txtTitle;
        $recipes->description = $request->txtDescription;
        $recipes->ingredients = $request->txtIngredients;
        $recipes->steps = $request->txtSteps;
        $img_name = $request->file('imageUpload')->getClientOriginalName();
        $recipes->image = $img_name;
        $recipes->id_categories = $request->txtCategories;

        $recipes->save();

        $upload = 'upload';
        $request->file('imageUpload')->move($upload, $img_name);
        return redirect()->route('admin.recipes.index')->with('warning', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipes::where('id', $id)->delete();
        return redirect()->route('admin.recipes.index')->with('danger', 'Xóa thành công!');
    }
}
