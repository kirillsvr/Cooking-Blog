<?php

namespace App\Http\Controllers\Front;

use App\Actions\RecipeComments\RecipeCommentsStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeComments;
use App\Models\RecipeComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeCommentsController extends Controller
{
    public function store(StoreRecipeComments $request, string $id, RecipeCommentsStoreAction $action)
    {
        $action->execute($request->validated(), $id);
        return response()->json('OK', 200);
    }
}
