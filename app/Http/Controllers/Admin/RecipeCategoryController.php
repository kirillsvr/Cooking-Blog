<?php

namespace App\Http\Controllers\Admin;

use App\Actions\RecipeCategory\RecipeCategoryUpdateAction;
use App\DTO\RecipeCategoryUpdateRequestData;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeCategory;
use App\Models\RecipeCategory;
use App\Services\ImageSaveService;
use Illuminate\Support\Facades\Storage;

class RecipeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RecipeCategory::all();
        return view('admin.recipe_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recipe_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeCategory $request)
    {
        $data = $request->all();
        $data->thumbnail = ImageSaveService::uploadImage($data->thumbnail);
        RecipeCategory::create($data);
        return response()->json('Категория успешно добавлена', 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeCategory $recipeCategory)
    {
        return view('admin.recipe_category.edit', compact('recipeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeCategoryUpdateRequestData $data, RecipeCategory $recipeCategory, RecipeCategoryUpdateAction $action)
    {
        $action->execute($data, $recipeCategory);
        return response()->json('Категория успешно изменена', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeCategory $recipeCategory)
    {
        Storage::delete($recipeCategory->thumbnail);
        $recipeCategory->delete();
        return response()->json('Категория успешно удалена', 200);
    }
}
