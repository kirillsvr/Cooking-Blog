<?php

namespace App\Services\RecipeComments;

use App\Models\Recipe;
use App\Services\ImageSaveService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ChangeRecipeRequestService
{
    private $recipe;
    private $imageService;

    public function __construct(Recipe $recipe, ImageSaveService $image)
    {
        $this->recipe = $recipe;
        $this->imageService = $image;
    }

    public function change(Request $request, Recipe $recipe = null): array
    {
        $this->request = $request;
        $this->recipe = $recipe;

        if ($this->recipe){
            $recipe->recipeIngredients()->delete();
            $recipe->recipeSteps()->delete();
        }

        $data['recipe'] = $this->request->all();
        $data['recipe']['thumbnail'] = $this->uploadImage($data['recipe']['thumbnail'], $recipe->thumbnail ?? null);

        $data['steps'] = $this->steps($data['recipe']['steps']);
        $data['ingredients'] = $data['recipe']['ing'];
        $data['tags'] = $data['recipe']['tags'];
        unset($data['recipe']['steps']);
        unset($data['recipe']['ing']);
        unset($data['recipe']['tags']);

        return $data;
    }

    private function steps(array $steps): array
    {
        $newArray = [];
        $i = 0;
        foreach ($steps as $step){
            $newArray[$i]['step'] = $step['step'];
            $newArray[$i]['info'] = $step['description'];
            if (!is_null($step['image'])){
                $newArray[$i]['image'] = $this->uploadImage($step['image']);
            }
            $i++;
        }

        return $newArray;
    }

    private function uploadImage(UploadedFile $file, string $image = null): string
    {
        if ($image) Storage::delete($image);
        $folder = date('Y-m-d');
        return $file->store("images/{$folder}");
    }
}
