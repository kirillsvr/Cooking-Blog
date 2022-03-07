<?php

namespace App\Actions\Post;

use App\Models\Post;
use App\Services\ImageSaveService;

class PostStoreAction
{
    protected $service;

    public function __construct(ImageSaveService $service)
    {
        $this->service = $service;
    }

    public function execute($data)
    {
        $data['thumbnail'] = $this->service->uploadImage($data['thumbnail']);
        $post = Post::create($data);
        $post->tags()->sync($data['tags']);
    }
}
