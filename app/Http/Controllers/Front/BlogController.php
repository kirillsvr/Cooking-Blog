<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Actions\Blog\BlogIndexAction;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StoreSearch;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(FilterRequest $request, BlogIndexAction $action)
    {
        return view('front.blog.index', $action->execute($request->validated()));
    }

    public function liveSearch(Request $request)
    {
        $posts = PostRepository::getPostFromSearch($request->search)->toArray();
        return $posts;
    }
}
