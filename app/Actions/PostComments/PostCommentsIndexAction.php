<?php

namespace App\Actions\PostComments;

use App\Models\Post;
use App\Services\RecipeComments\CommentsService;

class PostCommentsIndexAction
{
    private CommentsService $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($id)
    {
        $post = Post::with('comments')->find($id);
        $comments = $this->service->modify($post->comments->toArray());

        return compact(
            'post',
            'comments'
        );
    }
}
