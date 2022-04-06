<?php

namespace App\Repositories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RecipeRepository
{
    public static function recipeWithAllRelations(string $id): Recipe|null
    {
        return Recipe::with('recipeComments', 'user', 'recipeIngredients', 'recipeCategory', 'recipeSteps', 'recipeTags', 'level')->where('slug', $id)->first();;
    }

    public static function relatedFourRecipesFromSameCategory(string $id, string $categoryId): Collection|null
    {
        return Recipe::where('recipe_categories_id', $categoryId)->where('id', '!=', $id)->limit(4)->get();
    }

    public static function getRecipeFromSearch(string $data): Collection|null
    {
        return Recipe::select('title', 'id')->where('title', 'LIKE', "%{$data}%")->get();
    }

    public static function fourMorePopularRecipes(): Collection|null
    {
        return Recipe::orderBy('views')->limit(4)->get();
    }
}
