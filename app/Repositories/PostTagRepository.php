<?php

namespace App\Repositories;

use App\Models\Tag;

class PostTagRepository
{
    public function getAllTitle(): array
    {
        return Tag::pluck('title', 'id')->all();
    }
}
