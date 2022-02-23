<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\AdminRecipeFilter;
use App\Http\Requests\FilterRequest;
use App\Models\ChangeRecipeRequest;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeTags;
use App\Models\User;
use App\Services\RecipeComments\ChangeRecipeRequestService;
use App\Services\RecipeComments\CommentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{

    protected $service;

    public function __construct(ChangeRecipeRequestService $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request)
    {
        $categories = //RecipeCategory::pluck('title', 'id')->all();
        $tags = //RecipeTags::pluck('title', 'id')->all();
        $data = $request->validated();
        $filter = app()->make(AdminRecipeFilter::class, ['queryParams' => array_filter($data)]);
        $recipes = Recipe::filter($filter)->with('recipeComments')->paginate(15);

        foreach ($recipes as &$recipe){
            $recipe['countComm'] = $recipe->recipeComments()->count();
        }
        return view('admin.recipe.index', compact('recipes', 'categories', 'data', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RecipeCategory::pluck('title', 'id')->all();
        $tags = RecipeTags::pluck('title', 'id')->all();
        $authors = User::whereIn('role', [2, 3])->get();
        return view('admin.recipe.create', compact('categories', 'tags', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data = $this->service->change($request);
        $recipe = Recipe::create($data['recipe']);
        $recipe->recipeSteps()->createMany($data['steps']);
        $recipe->recipeIngredients()->createMany($data['ingredients']);
        $recipe->recipeTags()->sync($request->tags);
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
    public function edit($id)
    {
        $categories = RecipeCategory::pluck('title', 'id')->all();
        $recipe = Recipe::find($id);
        $this->authorize('edit', $recipe);
        $ingredients = $recipe->recipeIngredients->toArray();
        $steps = $recipe->recipeSteps->toArray();
        $authors = User::whereIn('role', [2, 3])->get();
        return view('admin.recipe.edit', compact('categories', 'recipe', 'ingredients', 'steps', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $data = $this->service->change($request, $recipe);
        $recipe->update($data['recipe']);
        $recipe->recipeSteps()->createMany($data['steps']);
        $recipe->recipeIngredients()->createMany($data['ingredients']);
        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->recipeTags()->sync([]);
        $recipe->recipeSteps()->delete();
        $recipe->recipeIngredients()->delete();
        Storage::delete($recipe->thumbnail);
        $recipe->delete();
        return redirect()->route('posts.index')->with('success', 'Рецепт удален');
    }
}
