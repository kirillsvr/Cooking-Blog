<?php

namespace App\Services\RecipeComments;

use App\Services\ImageSaveService;

class ChangeRecipeRequestService
{
    private ImageSaveService $imageService;
    private array $recipe;

    public function __construct(ImageSaveService $image)
    {
        $this->imageService = $image;
    }

    public function change(array $recipe, string|null $oldRecipeImage = null): array
    {
        $this->recipe = $recipe;

        $this->recipe['thumbnail'] = $this->checkPresenceImage($this->recipe, 'thumbnail');

        $steps = $this->createStepsArray();
        $tags = $this->createTagsArray();
        $ingredients = $this->createIngredientsArray();
        $recipe = $this->recipe;

        return compact(
            'recipe',
            'steps',
            'ingredients',
            'tags'
        );
    }

    private function checkPresenceImage(array &$data, string $nameImage)
    {
        if (isset($data[$nameImage]) && !is_null($data[$nameImage])){
            $oldImage = $data['oldImage'] ?? null;
            unset($data['oldImage']);
            return $this->imageService->uploadImage($data[$nameImage], $oldImage);
        }

        if (isset($data['oldImage']) && !is_null($data['oldImage'])){
            $image = $data['oldImage'];
            unset($data['oldImage']);
            return $image;
        }

        return null;
    }

    private function createStepsArray(): array|null
    {
        if (!isset($this->recipe['steps'])) return null;

        $newArray = [];
        $i = 0;
        foreach ($this->recipe['steps'] as $step){
            $newArray[$i]['step'] = $step['step'];
            $newArray[$i]['info'] = $step['description'];
            $newArray[$i]['image'] = $this->checkPresenceImage($step, 'image');
            $i++;
        }

        unset($this->recipe['steps']);

        return $newArray;
    }

    private function createIngredientsArray(): array|null
    {
        if (isset($this->recipe['ing'])){
            $ingredients = $this->recipe['ing'];
            unset($this->recipe['ing']);

            return $ingredients;
        }

        return null;
    }

    private function createTagsArray(): array|null
    {
        if (isset($this->recipe['tags'])){
            $tags = $this->recipe['tags'];
            unset($this->recipe['tags']);

            return $tags;
        }

        return null;
    }
}
