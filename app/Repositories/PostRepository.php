<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    public static function getPostWithRelations(string $id): Model
    {
        return Post::with('user', 'tags', 'category')->find($id);
    }

    public static function getPostWithRelationsFromSlug(string $id): Model
    {
        return Post::with('user', 'tags', 'category')->where('slug', $id)->first();
    }

    public static function getPrev(string $id): Post|null
    {
        return Post::where('id', '<', $id)
            ->orderBy('id', 'DESC')
            ->first();
    }

    public static function getNext(string $id): Post|null
    {
        return Post::where('id', '>', $id)
            ->oldest('id')
            ->first();
    }

    public static function getFirst(): Post
    {
        return Post::first();
    }

    public static function getLast(): Post
    {
        return Post::latest('id')->first();
    }

    public static function getRandom(string $id, int $quantity): Collection
    {
        return Post::with('comments')->inRandomOrder()->where('id', '!=', $id)->limit($quantity)->get();
    }

    public static function getPostFromSearch(string $data): Collection
    {
        return Post::select('title', 'slug')->where('title', 'LIKE', "%{$data}%")->get();
    }

    public static function getArchivePostsMonthYears(): Collection|null
    {
        return Post::select(
            DB::raw("DATE_FORMAT(created_at,'%M') as month"),
            DB::raw("DATE_FORMAT(created_at,'%Y') as year")
        )
            ->distinct('month', 'year')
            ->orderBy('year', 'DESC')
            ->orderBy('month', 'DESC')
            ->limit(10)
            ->get();
    }
}
