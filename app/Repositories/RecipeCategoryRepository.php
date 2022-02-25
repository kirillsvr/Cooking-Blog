<?php
namespace App\Repositories;

use App\Models\RecipeCategory;
use Illuminate\Support\Collection;

class RecipeCategoryRepository
{
    public function getAllTitle(): array
    {
        return RecipeCategory::pluck('title', 'id')->all();
    }
}
