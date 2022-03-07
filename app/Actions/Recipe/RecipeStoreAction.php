<?php

namespace App\Actions\Recipe;

use App\Models\Recipe;
use App\Services\RecipeComments\ChangeRecipeRequestService;

class RecipeStoreAction
{
    private $service;

    public function __construct(ChangeRecipeRequestService $service)
    {
        $this->service = $service;
    }

    public function execute($data): void
    {
        $data = $this->service->change($data);
        $recipe = Recipe::create($data['recipe']);
        $recipe->recipeSteps()->createMany($data['steps']);
        $recipe->recipeIngredients()->createMany($data['ingredients']);
        $recipe->recipeTags()->sync($data['tags']);
    }
}
