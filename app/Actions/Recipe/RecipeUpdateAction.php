<?php

namespace App\Actions\Recipe;

use App\Actions\AbstractRecipeAddAction;
use App\Actions\Action;
use App\DTO\RecipeUpdateRequestData;
use App\Models\Recipe;
use App\Repositories\RecipeIngredientsRepository;
use App\Repositories\RecipeStepsRepository;
use App\Services\ImageSaveService;

class RecipeUpdateAction extends AbstractRecipeAddAction
{
    public function execute(RecipeUpdateRequestData $data, Recipe $recipe): void
    {
        $this->deleteOldData($recipe);
        $this->updateRecipe($data->all(), $recipe);
        $this->createSteps($recipe, $data->steps);
        $this->createIngredients($recipe, $data->ing);
        $this->createTags($recipe, $data->tags);
    }

    private function deleteOldData(Recipe $recipe): void
    {
        RecipeIngredientsRepository::deleteIngredients($recipe->id);
        RecipeStepsRepository::deleteSteps($recipe->id);
    }

    private function updateRecipe(array $data, Recipe $recipe): void
    {
        if (!is_string($data['thumbnail'])) $data['thumbnail'] = ImageSaveService::uploadImage($data['thumbnail'], $data['old_image']);

        $recipe->update($data);
    }
}
