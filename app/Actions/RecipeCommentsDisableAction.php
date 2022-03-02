<?php

namespace App\Actions;

use App\Models\RecipeComments;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class RecipeCommentsDisableAction
{
    private GetRelatedIdCommentsService $service;

    public function __construct(GetRelatedIdCommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($commentId, $recipeId, int $enable)
    {
        $comments = RecipeComments::where('recipe_id', $recipeId)->get()->toArray();
        $relatedComments = $this->service->generateRelatedIdsArray($commentId, $comments);
        DB::table('recipe_comments')
            ->whereIn('id', $relatedComments)
            ->update(['is_published' => $enable]);
    }
}
