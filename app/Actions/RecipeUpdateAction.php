<?php

namespace App\Actions;

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
        $this->ingredientsRepository->deleteIngredients($data['id']);
        $this->stepsRepository->deleteSteps($data['id']);

        $data = $this->service->change($data, $recipe->thumbnail);
        $recipe->update($data['recipe']);
        $recipe->recipeSteps()->createMany($data['steps']);
        $recipe->recipeIngredients()->createMany($data['ingredients']);
    }
}
