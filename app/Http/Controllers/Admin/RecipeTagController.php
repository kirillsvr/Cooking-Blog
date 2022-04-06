<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeTag;
use App\Http\Requests\StoreTag;
use App\Models\RecipeTags;
use Illuminate\Http\Request;

class RecipeTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = RecipeTags::all();
        return view('admin.recipe_tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recipe_tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeTag $request)
    {
        RecipeTags::create($request->all());
        return response()->json('Рубрика успешно добавлена', 200);
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
    public function edit(RecipeTags $recipeTag)
    {
        return view('admin.recipe_tags.edit', compact('recipeTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecipeTag $request, RecipeTags $recipeTag)
    {
        $recipeTag->slug = null;
        $recipeTag->update($request->validated());
        return response()->json('Рубрика успешно изменена', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeTags $recipeTag)
    {
        $recipeTag->delete();
        return response()->json('Рубрика успешно удалена', 200);
    }
}
