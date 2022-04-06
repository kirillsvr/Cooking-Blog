<?php

namespace App\Actions\Post;

use App\DTO\PostCreateRequestData;
use App\Models\Post;
use App\Repositories\PostTagRepository;
use App\Services\ImageSaveService;

class PostStoreAction
{
    public function execute(PostCreateRequestData $data)
    {
        $data->thumbnail = ImageSaveService::uploadImage($data->thumbnail);
        $post = Post::create($data->all());
        PostTagRepository::addOrDeleteTags($data->tags, $post);
    }
}
