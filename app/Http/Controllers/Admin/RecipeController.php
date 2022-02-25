<?php

namespace App\Http\Controllers\Admin;

use App\Actions\GetCategoriesTagsAuthorsAction;
use App\Actions\RecipeDestroyAction;
use App\Actions\RecipeEditAction;
use App\Actions\RecipeIndexAction;
use App\Actions\RecipeStoreAction;
use App\Actions\RecipeUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Recipe;
use App\Services\RecipeComments\ChangeRecipeRequestService;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    protected $service;

    public function __construct(ChangeRecipeRequestService $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request, RecipeIndexAction $action)
    {
        return view('admin.recipe.index', $action->execute($request->validated()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GetCategoriesTagsAuthorsAction $action)
    {
        return view('admin.recipe.create', $action->execute());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RecipeStoreAction $action)
    {
        $action->execute($request->all());
        return redirect()->home();
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
    public function update(Request $request, Recipe $recipe, RecipeUpdateAction $action)
    {
        $action->execute($request->validated(), $recipe);
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
