<?php

namespace App\Actions\Recipe;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeDestroyAction
{
    public function execute(Recipe $recipe)
    {
        $recipe->recipeTags()->sync([]);
        $recipe->recipeSteps()->delete();
        $recipe->recipeIngredients()->delete();
        Storage::delete($recipe->thumbnail);
        $recipe->delete();
    }
}
