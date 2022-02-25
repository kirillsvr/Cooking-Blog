<?php

namespace App\Repositories;

use App\Models\RecipeTags;
use Illuminate\Support\Collection;

class RecipeTagRepository
{
    public function getAllTitle(): array
    {
        return RecipeTags::pluck('title', 'id')->all();
    }
}
