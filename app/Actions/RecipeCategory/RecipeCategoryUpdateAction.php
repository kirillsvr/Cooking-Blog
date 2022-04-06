<?php

namespace App\Actions\RecipeCategory;


use App\DTO\RecipeCategoryUpdateRequestData;
use App\Models\RecipeCategory;
use App\Services\ImageSaveService;

class RecipeCategoryUpdateAction
{
    public function execute(RecipeCategoryUpdateRequestData $data, RecipeCategory $recipeCategory)
    {
        $data->thumbnail = $this->uploadImage($data);
        $recipeCategory->slug = null;
        $recipeCategory->update($data->all());
    }

    private function uploadImage(RecipeCategoryUpdateRequestData $data): string
    {
        if (is_string($data->thumbnail)) return $data->thumbnail;

        return ImageSaveService::uploadImage($data->thumbnail, $data->old_image);
    }
}
