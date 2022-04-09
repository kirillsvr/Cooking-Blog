<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostComments;
use Illuminate\Database\Eloquent\Collection;

class PostCommentsRepository
{
    public static function getPublishedCommentsFromPost(Post $post): Collection
    {
        return $post->comments()->where('is_published', 1)->get();
    }

    public static function samePost(string $postId): array
    {
        return PostComments::where('post_id', $postId)->get()->toArray();
    }
}
