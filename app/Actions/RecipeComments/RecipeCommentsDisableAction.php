<?php

namespace App\Actions\RecipeComments;

use App\Exceptions\CheckParentCommentException;
use App\Models\RecipeComments;
use App\Services\RecipeComments\CheckDisableParentComments;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class RecipeCommentsDisableAction
{
    private GetRelatedIdCommentsService $relatedComments;

    public function __construct(GetRelatedIdCommentsService $relatedComments)
    {
        $this->relatedComments = $relatedComments;
    }

    public function execute($commentId, $recipeId)
    {
        $comments = RecipeComments::where('recipe_id', $recipeId)->get()->toArray();
        $relatedComments = $this->relatedComments->generateRelatedIdsArray($commentId, $comments);
        DB::table('recipe_comments')
            ->whereIn('id', $relatedComments)
            ->update(['is_published' => 0]);
    }
}
