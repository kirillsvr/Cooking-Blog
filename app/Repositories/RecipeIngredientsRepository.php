<?php

namespace App\Repositories;

use App\Models\RecipeIngredients;

class RecipeIngredientsRepository
{
    public static function deleteIngredients($id)
    {
        RecipeIngredients::where('recipe_id', $id)->delete();
    }
}
