<?php

namespace App\Repositories;

use App\Models\RecipeComments;

class RecipeCommentsRepository
{
    public static function sameRecipe(string $recipeId)
    {
        return RecipeComments::where('recipe_id', $recipeId)->get()->toArray();
    }
}
