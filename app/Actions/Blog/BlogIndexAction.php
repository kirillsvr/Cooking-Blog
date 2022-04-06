<?php

namespace App\Actions\Blog;

use App\Http\Filters\PostFilter;
use App\Http\Filters\RecipeFilter;
use App\Models\Post;
use App\Models\Recipe;
use App\Services\GetSettingService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogIndexAction
{
    public function execute(array $data)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->with('comments', 'user')->paginate(config('settingsFront.post_on_page'));

        return compact('posts');
    }
}
