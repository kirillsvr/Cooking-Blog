<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Recipe\RecipeGetCategoriesTagsAuthorsAction;
use App\Actions\Recipe\RecipeDestroyAction;
use App\Actions\Recipe\RecipeEditAction;
use App\Actions\Recipe\RecipeIndexAction;
use App\Actions\Recipe\RecipeStoreAction;
use App\Actions\Recipe\RecipeUpdateAction;
use App\DTO\RecipeCreateRequestData;
use App\DTO\RecipeUpdateRequestData;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Recipe;

class RecipeController extends Controller
{

    public function index(FilterRequest $request, RecipeIndexAction $action)
    {
        return view('admin.recipe.index', $action->execute($request->validated()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RecipeGetCategoriesTagsAuthorsAction $action)
    {
        return view('admin.recipe.create', $action->execute());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeCreateRequestData $request, RecipeStoreAction $action)
    {
        $action->execute($request);
        return redirect()->route('recipe.index');
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
    public function edit(Recipe $recipe, RecipeEditAction $action)
    {
        $this->authorize('edit', $recipe);
        return view('admin.recipe.edit', $action->execute($recipe));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeUpdateRequestData $request, Recipe $recipe, RecipeUpdateAction $action)
    {
        $action->execute($request, $recipe);
        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe, RecipeDestroyAction $action)
    {
        $action->execute($recipe);
        return redirect()->route('posts.index')->with('success', 'Рецепт удален');
    }
}
