<?php

namespace App\Actions\Recipe;

use App\Events\RecipeHasViewed;
use App\Models\Recipe;
use App\Repositories\RecipeRepository;
use App\Services\RecipeComments\CommentsService;

class RecipeFrontShowAction
{
    protected $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function execute(string $id)
    {
        $recipe = RecipeRepository::recipeWithAllRelations($id);
        event(new RecipeHasViewed($recipe));
        $related = RecipeRepository::relatedFourRecipesFromSameCategory($recipe->id, $recipe->recipeCategory->id);
        $comments = $this->service->modify($recipe->recipeComments->where('is_published', 1)->toArray());

        return compact(
            'recipe',
            'related',
            'comments'
        );
    }
}
