<?php

namespace App\Actions\Post;

use App\Models\Post;
use App\Services\ImageSaveService;

class PostUpdateAction
{
    protected $service;

    public function __construct(ImageSaveService $service)
    {
        $this->service = $service;
    }

    public function execute(array $data, Post $post)
    {
        $data['thumbnail'] = $this->service->uploadImage($data['thumbnail'], $post->thumbnail);
        $post->update($data);
        $post->tags()->sync($data['tags']);
    }
}
