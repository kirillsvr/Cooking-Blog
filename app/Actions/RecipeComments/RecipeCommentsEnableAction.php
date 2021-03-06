<?php

namespace App\Actions\RecipeComments;

use App\Actions\AbstractCommentsEnableAction;
use App\Repositories\RecipeCommentsRepository;
use Illuminate\Support\Facades\DB;

class RecipeCommentsEnableAction extends AbstractCommentsEnableAction
{
    public function execute(string $commentId, string $elementId): void
    {
        $comments = RecipeCommentsRepository::sameRecipe($elementId);
        $this->checkParentPublish($comments, $commentId);
        DB::table('recipe_comments')
            ->where('id', $commentId)
            ->update(['is_published' => 1]);
    }
}
