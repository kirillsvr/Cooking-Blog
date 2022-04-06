<?php

namespace App\Repositories;

use App\Models\RecipeTags;
use Illuminate\Support\Collection;

class RecipeTagRepository
{
    public static function getAllTitle(): array
    {
        return RecipeTags::pluck('title', 'id')->all();
    }

    public static function tagWithCountPosts(): Collection|null
    {
        return RecipeTags::withCount('recipes')->latest('recipes_count')->take(9)->get();
    }
}
