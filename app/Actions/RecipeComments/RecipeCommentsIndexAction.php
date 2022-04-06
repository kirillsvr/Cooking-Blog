<?php

namespace App\Actions\RecipeComments;

use App\Models\Recipe;
use App\Services\RecipeComments\CommentsService;

class RecipeCommentsIndexAction
{
    private CommentsService $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($id)
    {
        $recipe = Recipe::with('recipeComments')->find($id);
        $comments = $this->service->modify($recipe->recipeComments->toArray());

        return compact(
            'recipe',
            'comments'
        );
    }
}
