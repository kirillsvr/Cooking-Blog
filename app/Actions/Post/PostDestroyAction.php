<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostDestroyAction
{
    public function execute(Post $post)
    {
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
    }
}
