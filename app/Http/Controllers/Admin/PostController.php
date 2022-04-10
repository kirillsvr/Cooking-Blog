<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Post\GetPostCategoriesTags;
use App\Actions\Post\PostDestroyAction;
use App\Actions\Post\PostEditAction;
use App\Actions\Post\PostStoreAction;
use App\Actions\Post\PostUpdateAction;
use App\DTO\PostCreateRequestData;
use App\DTO\PostUpdateRequestData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('viewAny', Post::class)) $posts = Post::with('category', 'tags', 'user', 'comments')->paginate(config('settingsAdmin.post_on_page'));
            else $posts = Post::with('category', 'tags', 'user', 'comments')->where('user_id', Auth::user()->id)->paginate(config('settingsAdmin.post_on_page'));
        return view('admin.posts.index', compact('posts'));
    }

    public function create(GetPostCategoriesTags $action)
    {
        return view('admin.posts.create', $action->execute());
    }

    public function store(PostCreateRequestData $request, PostStoreAction $action)
    {
        $action->execute($request);
        return response()->json('Статья успешно добавлена', 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post, PostEditAction $action)
    {
        $this->authorize('view', $post);
        return view('admin.posts.edit', $action->execute($post));
    }

    public function update(PostUpdateRequestData $request, Post $post, PostUpdateAction $action)
    {
        $this->authorize('update', $post);
        $action->execute($request, $post);
        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Post $post, PostDestroyAction $action)
    {
        $this->authorize('delete', $post);
        $action->execute($post);
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
