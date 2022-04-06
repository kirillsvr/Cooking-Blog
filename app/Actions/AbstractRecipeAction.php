<?php

namespace App\Actions;

use App\Repositories\RecipeCategoryRepository;
use App\Repositories\RecipeTagRepository;
use App\Repositories\UsersRepository;

abstract class AbstractRecipeAction
{
    protected function getCategories()
    {
        return RecipeCategoryRepository::getAllTitle();
    }

    protected function getTags()
    {
        return RecipeTagRepository::getAllTitle();
    }

    protected function getAuthors()
    {
        return UsersRepository::usersWithAccessAdminPanel();
    }
}
