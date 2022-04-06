<?php

namespace App\Actions\Post;

use App\DTO\PostUpdateRequestData;
use App\Models\Post;
use App\Repositories\PostTagRepository;
use App\Services\ImageSaveService;
use Illuminate\Http\UploadedFile;

class PostUpdateAction
{
    public function execute(PostUpdateRequestData $data, Post $post)
    {
        $data->thumbnail = $this->uploadImage($data->thumbnail, $post);
        $post->update($data->all());
        PostTagRepository::addOrDeleteTags($data->tags, $post);
    }

    private function uploadImage(UploadedFile|string $thumbnail, Post $post): string
    {
        if (is_string($thumbnail)) return $thumbnail;

        return ImageSaveService::uploadImage($thumbnail, $post->thumbnail);
    }
}
