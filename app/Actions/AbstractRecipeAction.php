<?php

namespace App\Actions;

use App\Repositories\RecipeCategoryRepository;
use App\Repositories\RecipeTagRepository;
use App\Repositories\UsersRepository;

abstract class AbstractRecipeAction
{
    protected $categories;
    protected $tags;
    protected $authors;

    public function __construct(
        RecipeCategoryRepository $categories,
        RecipeTagRepository $tags,
        UsersRepository $authors
    )
    {
        $this->categories = $categories;
        $this->tags = $tags;
        $this->authors = $authors;
    }

    protected function getCategories()
    {
        return $this->categories->getAllTitle();
    }

    protected function getTags()
    {
        return $this->tags->getAllTitle();
    }

    protected function getAuthors()
    {
        return $this->authors->usersWithAccessAdminPanel();
    }
}
