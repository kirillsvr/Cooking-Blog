<?php

namespace App\Actions;

use App\Models\Recipe;
use App\Services\ImageSaveService;

abstract class AbstractRecipeAddAction
{
    protected function createSteps(Recipe $recipe, array $steps): void
    {
        $recipe->recipeSteps()->createMany($this->modifySteps($steps));
    }

    protected function modifySteps(array $steps): array
    {
        return array_map(function ($value){
            if(is_string($value['image'])) return $value;
            $value['image'] = ImageSaveService::uploadImage($value['image'], $value['old_image'] ?? null);
            return $value;
        }, $steps);
    }

    protected function createIngredients(Recipe $recipe, array $ingredients): void
    {
        $recipe->recipeIngredients()->createMany($ingredients);
    }

    protected function createTags(Recipe $recipe, array|null $tags): void
    {
        if (is_null($tags)) return;

        $recipe->recipeTags()->sync($tags);
    }
}
