<?php

namespace App\Actions\Recipe;

use App\Actions\AbstractRecipeAddAction;
use App\DTO\RecipeCreateRequestData;
use App\Models\Recipe;
use App\Services\ImageSaveService;

class RecipeStoreAction extends AbstractRecipeAddAction
{
    public function execute(RecipeCreateRequestData $data): void
    {
        $recipe = $this->createRecipe($data->all());
        $this->createSteps($recipe, $data->steps);
        $this->createIngredients($recipe, $data->ing);
        $this->createTags($recipe, $data->tags);
    }

    private function createRecipe(array $recipe): Recipe
    {
        $recipe['thumbnail'] = ImageSaveService::uploadImage($recipe['thumbnail']);

        return Recipe::create($recipe);
    }
}
