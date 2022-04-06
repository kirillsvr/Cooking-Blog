<?php

namespace App\DTO;

use App\Http\Requests\StoreRecipeUpdate;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

class RecipeUpdateRequestData extends DataTransferObject
{
    public string $title;

    public int $prep_time;

    public int $cook_time;

    public string $skill_level;

    public int $user_id;

    public string $content;

    public int $recipe_categories_id;

    public array|null $tags;

    public UploadedFile|string $thumbnail;

    public string $old_image;

    public int $caloric;

    public int $protein;

    public int $fat;

    public int $carbohydrates;

    public array $ing;

    public array $steps;

    public function __construct(StoreRecipeUpdate $data)
    {
        if (is_null($data->user_id)) $this->user_id = Auth::user()->id;
        if (is_null($data->thumbnail)) $this->thumbnail = $data->old_image;
        parent::__construct($data->validated());
        $this->steps = $this->stepsChecker($data->steps);
    }

    private function stepsChecker(array $steps): array
    {
        return array_map(function ($value){
            if (!isset($value['image']) || is_null($value['image'])) $value['image'] = $value['old_image'];
            return $value;
        }, $steps);
    }
}
