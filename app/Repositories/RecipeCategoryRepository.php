<?php
namespace App\Repositories;

use App\Models\RecipeCategory;
use Illuminate\Support\Collection;

class RecipeCategoryRepository
{
    public function getAllTitle(): Collection
    {
        return RecipeCategory::pluck('title', 'id')->all();
    }
}
