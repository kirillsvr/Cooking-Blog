<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageSaveService
{
    public function uploadImage(Request $request, string $imageName, string|null $oldImage = null)
    {
        if ($request->hasFile($imageName)){
            if ($oldImage) Storage::delete($oldImage);
            $folder = date('Y-m-d');
            return $request->file($imageName)->store("images/{$folder}");
        }

        return null;
    }
}
