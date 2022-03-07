<?php

namespace App\Actions\Recipe;

use App\Models\Recipe;
use App\Repositories\RecipeIngredientsRepository;
use App\Repositories\RecipeStepsRepository;
use App\Services\RecipeComments\ChangeRecipeRequestService;

class RecipeUpdateAction
{
    private $service;
    private $ingredientsRepository;
    private $stepsRepository;

    public function __construct(
        ChangeRecipeRequestService $service,
        RecipeIngredientsRepository $ingredientsRepository,
        RecipeStepsRepository $stepsRepository
    )
    {
        $this->service = $service;
        $this->ingredientsRepository = $ingredientsRepository;
        $this->stepsRepository = $stepsRepository;
    }

    public function execute(array $data, Recipe $recipe): void
    {
        $this->ingredientsRepository->deleteIngredients($recipe->id);
        $this->stepsRepository->deleteSteps($recipe->id);

        $data = $this->service->change($data, $recipe->thumbnail);
        $recipe->update($data['recipe']);
        if (!is_null($data['steps'])) $recipe->recipeSteps()->createMany($data['steps']);
        if (!is_null($data['ingredients'])) $recipe->recipeIngredients()->createMany($data['ingredients']);
    }
}
