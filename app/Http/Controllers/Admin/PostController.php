<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Post\GetPostCategoriesTags;
use App\Actions\Post\PostDestroyAction;
use App\Actions\Post\PostEditAction;
use App\Actions\Post\PostStoreAction;
use App\Actions\Post\PostUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(config('settings.post_on_page'));
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GetPostCategoriesTags $action)
    {
        return view('admin.posts.create', $action->execute());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request, PostStoreAction $action)
    {
        $action->execute($request->validated());
        $request->session()->flash('success', 'Статья добавлена');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, PostEditAction $action)
    {
        return view('admin.posts.edit', $action->execute($post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post, PostUpdateAction $action)
    {
        $action->execute($request->validated(), $post);
        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, PostDestroyAction $action)
    {
        $action->execute($post);
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
