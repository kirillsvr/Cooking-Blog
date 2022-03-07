<?php

namespace App\Actions\RecipeComments;

use App\Exceptions\CheckParentCommentException;
use App\Models\RecipeComments;
use App\Services\RecipeComments\CheckDisableParentComments;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class RecipeCommentsEnableAction
{
    private CheckDisableParentComments $checkParents;

    public function __construct(CheckDisableParentComments $checkParents)
    {
        $this->checkParents = $checkParents;
    }

    public function execute($commentId, $recipeId)
    {
        $comments = RecipeComments::where('recipe_id', $recipeId)->get()->toArray();
        $this->checkParentPublish($comments, $commentId);
        DB::table('recipe_comments')
            ->where('id', $commentId)
            ->update(['is_published' => 1]);
    }

    private function checkParentPublish(array $comments, string $commentId)
    {
        if (!$this->checkParents->executeCheck($comments, $commentId))
            throw new CheckParentCommentException('Нельзя опубликовать комментарий если его родители не опубликованы');
    }
}
