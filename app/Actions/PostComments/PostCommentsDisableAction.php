<?php

namespace App\Actions\PostComments;

use App\Repositories\PostCommentsRepository;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class PostCommentsDisableAction
{
    private GetRelatedIdCommentsService $relatedComments;

    public function __construct(GetRelatedIdCommentsService $relatedComments)
    {
        $this->relatedComments = $relatedComments;
    }

    public function execute($commentId, $postId)
    {
        $comments = PostCommentsRepository::samePost($postId);
        $relatedComments = $this->relatedComments->generateRelatedIdsArray($commentId, $comments);
        DB::table('post_comments')
            ->whereIn('id', $relatedComments)
            ->update(['is_published' => 0]);
    }
}
