<?php

namespace App\Http\Controllers\Front;

use App\Actions\Post\PostFrontAction;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use function view;

class ArticleController extends Controller
{
    public function show(string $id, PostFrontAction $action)
    {
        return view('front.article.show', $action->execute($id));
    }
}
