<?php

namespace App\Actions\PostComments;

use App\Repositories\PostCommentsRepository;
use App\Services\RecipeComments\GetRelatedIdCommentsService;
use Illuminate\Support\Facades\DB;

class PostCommentsDeleteAction
{
    private GetRelatedIdCommentsService $service;

    public function __construct(GetRelatedIdCommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($commentId, $postId)
    {
        $comments = PostCommentsRepository::samePost($postId);
        $relatedComments = $this->service->generateRelatedIdsArray($commentId, $comments);
        DB::table('post_comments')
            ->whereIn('id', $relatedComments)
            ->delete();;
    }
}
