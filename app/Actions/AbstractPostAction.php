<?php

namespace App\Actions;

use App\Repositories\PostCategoryRepository;
use App\Repositories\PostTagRepository;
use App\Repositories\UsersRepository;

abstract class AbstractPostAction
{
    protected function getCategories()
    {
        return PostCategoryRepository::getAllTitle();
    }

    protected function getTags()
    {
        return PostTagRepository::getAllTitle();
    }
}
