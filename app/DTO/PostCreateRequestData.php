<?php

namespace App\DTO;

use App\Http\Requests\StorePost;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

class PostCreateRequestData extends DataTransferObject
{
    public string $title;

    public string $description;

    public string $content;

    public int $category_id;

    public array|null $tags;

    public UploadedFile|string $thumbnail;

    public int $user_id;

    public function __construct(StorePost $data)
    {
        if (is_null($data->user_id)) $this->user_id = Auth::user()->id;

        parent::__construct($data->validated());
    }
}
