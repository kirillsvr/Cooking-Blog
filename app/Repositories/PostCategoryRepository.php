<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class PostCategoryRepository
{
    public static function getAllTitle(): array
    {
        return Category::pluck('title', 'id')->all();
    }

    public static function getAllCategoriesWithRelations(): Collection|null
    {
        return Category::with('posts')->get();
    }
}
