<?php

namespace App\Http\Controllers\Front;

use App\Actions\Recipe\RecipeFrontShowAction;
use App\Actions\Recipe\RecipeIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use function view;

class RecipeController extends Controller
{
    public function index(FilterRequest $request, RecipeIndexAction $action)
    {
        return view('front.recipe.index', $action->execute($request->validated()));
    }

    public function show(string $id, RecipeFrontShowAction $action)
    {
        return view('front.recipe.show', $action->execute($id));
    }
}
