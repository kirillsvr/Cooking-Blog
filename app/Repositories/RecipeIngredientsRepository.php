<?php

namespace App\Repositories;

use App\Models\RecipeIngredients;

class RecipeIngredientsRepository
{
    public function deleteIngredients($id)
    {
        RecipeIngredients::where('recipe_id', $id)->delete();
    }
}
