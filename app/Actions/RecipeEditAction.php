<?php

namespace App\Actions;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\User;

class RecipeEditAction extends AbstractRecipeAction
{
    public function execute(Recipe $recipe)
    {
        $categories = $this->getCategories();
        $ingredients = $recipe->recipeIngredients->toArray();
        $steps = $recipe->recipeSteps->toArray();
        $authors = $this->getAuthors();

        return compact(
            'categories',
            'ingredients',
            'steps',
            'authors'
        );
    }
}
