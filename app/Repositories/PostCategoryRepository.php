<?php

namespace App\Repositories;

use App\Models\Category;

class PostCategoryRepository
{
    public function getAllTitle(): array
    {
        return Category::pluck('title', 'id')->all();
    }
}
