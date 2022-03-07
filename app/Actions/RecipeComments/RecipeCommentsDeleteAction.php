<?php

namespace App\Actions\RecipeComments;

use App\Models\RecipeComments;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class RecipeCommentsDeleteAction
{
    private GetRelatedIdCommentsService $service;

    public function __construct(GetRelatedIdCommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($commentId, $recipeId)
    {
        $comments = RecipeComments::where('recipe_id', $recipeId)->get()->toArray();
        $relatedComments = $this->service->generateRelatedIdsArray($commentId, $comments);
        DB::table('recipe_comments')
            ->whereIn('id', $relatedComments)
            ->delete();;
    }
}
