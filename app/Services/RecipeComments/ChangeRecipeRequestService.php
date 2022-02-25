<?php

namespace App\Services\RecipeComments;

use App\DTO\RecipeCreateRequestData;
use App\Models\Recipe;
use App\Repositories\RecipeIngredientsRepository;
use App\Repositories\RecipeStepsRepository;
use App\Services\ImageSaveService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ChangeRecipeRequestService
{
    private $imageService;

    public function __construct(ImageSaveService $image)
    {
        $this->imageService = $image;
    }

    public function change(array $recipe, string|null $oldRecipeImage = null): array
    {
        $recipe['thumbnail'] = $this->imageService->uploadImage($recipe['thumbnail'], $oldRecipeImage ?? null);

        $steps = $this->steps($recipe['steps']);
        $ingredients = $this->ingredients($recipe['ing']);
        $tags = $this->tags($recipe['tags']);

        return compact(
            'recipe',
            'steps',
            'ingredients',
            'tags'
        );
    }

    private function steps(array &$steps): array
    {
        $newArray = [];
        $i = 0;
        foreach ($steps as $step){
            $newArray[$i]['step'] = $step['step'];
            $newArray[$i]['info'] = $step['description'];
            if (!is_null($step['image'])){
                $newArray[$i]['image'] = $this->imageService->uploadImage($step['image']);
            }
            $i++;
        }

        unset($steps);
        return $newArray;
    }

    private function ingredients(array &$ingredients): array
    {
        $ingsArr = $ingredients;
        unset($ingredients);
        return $ingsArr;
    }

    private function tags(array &$tags): array
    {
        $tagsArr = $tags;
        unset($tags);
        return $tagsArr;
    }
}
