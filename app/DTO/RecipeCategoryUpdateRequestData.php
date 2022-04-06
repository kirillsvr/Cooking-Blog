<?php

namespace App\DTO;

use App\Http\Requests\StoreRecipeCategoryUpdate;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class RecipeCategoryUpdateRequestData extends DataTransferObject
{
    public string $title;

    public UploadedFile|string $thumbnail;

    public string $old_image;

    public function __construct(StoreRecipeCategoryUpdate $data)
    {
        if (is_null($data->thumbnail)) $this->thumbnail = $data->old_image;
        parent::__construct($data->validated());
    }
}
