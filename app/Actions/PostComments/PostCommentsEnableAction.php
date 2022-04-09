<?php

namespace App\Actions\PostComments;

use App\Actions\AbstractCommentsEnableAction;
use App\Repositories\PostCommentsRepository;
use Illuminate\Support\Facades\DB;

class PostCommentsEnableAction extends AbstractCommentsEnableAction
{
    public function execute(string $commentId, string $elementId): void
    {
        $comments = PostCommentsRepository::samePost($elementId);
        $this->checkParentPublish($comments, $commentId);
        DB::table('post_comments')
            ->where('id', $commentId)
            ->update(['is_published' => 1]);
    }
}
