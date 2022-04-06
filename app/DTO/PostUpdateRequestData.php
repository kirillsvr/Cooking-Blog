<?php

namespace App\DTO;

use App\Http\Requests\StorePostUpdate;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

class PostUpdateRequestData extends DataTransferObject
{
    public string $title;

    public string $description;

    public string $content;

    public int $category_id;

    public array|null $tags;

    public UploadedFile|string $thumbnail;

    public string $old_image;

    public int $user_id;

    public function __construct(StorePostUpdate $data)
    {
        if (is_null($data->user_id)) $this->user_id = Auth::user()->id;
        if (is_null($data->thumbnail)) $this->thumbnail = $data->old_image;
        parent::__construct($data->validated());
    }
}
