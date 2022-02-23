<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Recipe;
use App\Models\User;
use App\Services\RecipeComments\CommentsService;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('front.recipe.index');
    }

    public function show($id)
    {
        $recipe = Recipe::where('slug', $id)->first();
        $category = $recipe->recipeCategory;
        $ingredients = $recipe->recipeIngredients;
        $steps = $recipe->recipeSteps;
        $comments = $this->service->show($recipe);
        return view('front.recipe.show', compact('recipe', 'ingredients', 'steps', 'comments', 'category'));
    }
}
