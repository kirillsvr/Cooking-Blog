<?php

namespace App\Repositories;

use App\Models\RecipeSteps;

class RecipeStepsRepository
{
    public function deleteSteps($id)
    {
        RecipeSteps::where('recipe_id', $id)->delete();
    }
}
