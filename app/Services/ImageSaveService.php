<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageSaveService
{
    public static function uploadImage(UploadedFile $data, string|null $oldImage = null): string
    {
        if ($oldImage) Storage::delete($oldImage);
        $folder = date('Y-m-d');
        return $data->store("images/{$folder}");
    }
}
