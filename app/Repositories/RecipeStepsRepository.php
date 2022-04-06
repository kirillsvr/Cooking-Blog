<?php

namespace App\Repositories;

use App\Models\RecipeSteps;

class RecipeStepsRepository
{
    public static function deleteSteps($id)
    {
        RecipeSteps::where('recipe_id', $id)->delete();
    }
}
