<?php

namespace App\DTO;


use App\Http\Requests\StoreRecipe;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class RecipeCreateRequestData extends DataTransferObject
{
    public string $title;

    public int $prep_time;

    public int $cook_time;

    public int $skill_level;

    public int $user_id;

    public string $content;

    public int $recipe_categories_id;

    public array|null $tags;

    public UploadedFile $thumbnail;

    public int $caloric;

    public int $protein;

    public int $fat;

    public int $carbohydrates;

    public array $ing;

    public array $steps;

    public function __construct(StoreRecipe $request)
    {
        parent::__construct($request->validated());
    }
}
