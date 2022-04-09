<?php

namespace App\Actions\Post;

use App\Events\PostHasViewed;
use App\Models\Post;
use App\Repositories\PostCommentsRepository;
use App\Repositories\PostRepository;
use App\Services\RecipeComments\CommentsService;
use Illuminate\Database\Eloquent\Collection;

class PostFrontAction
{
    private $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function execute($id)
    {
        $post = PostRepository::getPostWithRelationsFromSlug($id);
        event(new PostHasViewed($post));
        $comments =  $this->modifyComments(PostCommentsRepository::getPublishedCommentsFromPost($post));
        $prevPost = $this->getPrev($post->id);
        $nextPost = $this->getNext($post->id);
        $relatedArticles = PostRepository::getRandom($post->id, 4);
        return compact(
            'post',
            'comments',
            'prevPost',
            'nextPost',
            'relatedArticles'
        );
    }

    private function modifyComments(Collection $comments): ?array
    {
        if (!$comments->count()) return null;

        return $this->service->modify($comments->toArray());
    }

    private function getPrev($id)
    {
        $postPrev = PostRepository::getPrev($id);

        if (is_null($postPrev)) return PostRepository::getLast();

        return $postPrev;
    }

    private function getNext($id)
    {
        $nextPrev = PostRepository::getNext($id);

        if (is_null($nextPrev)) return PostRepository::getFirst();

        return $nextPrev;
    }
}
