<?php

namespace App\Repositories;

use App\Models\Post;

class PostCommentsRepository
{
    public static function getPublishedCommentsFromPost(Post $post)
    {
        return $post->comments()->where('is_published', 1)->get();
    }
}
