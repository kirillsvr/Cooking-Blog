<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class PostTagRepository
{
    public static function getAllTitle(): array
    {
        return Tag::pluck('title', 'id')->all();
    }

    public static function addOrDeleteTags(array|null $tags, Post $post): void
    {
        $post->tags()->sync($tags ?? []);
    }

    public static function tagWithCountPosts(): Collection|null
    {
        return Tag::withCount('posts')->latest('posts_count')->take(9)->get();
    }
}
