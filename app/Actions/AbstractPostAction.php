<?php

namespace App\Actions;

use App\Repositories\PostCategoryRepository;
use App\Repositories\PostTagRepository;
use App\Repositories\UsersRepository;

abstract class AbstractPostAction
{
    protected $categories;
    protected $tags;
    protected $authors;

    public function __construct(
        PostCategoryRepository $categories,
        PostTagRepository $tags
    )
    {
        $this->categories = $categories;
        $this->tags = $tags;
    }

    protected function getCategories()
    {
        return $this->categories->getAllTitle();
    }

    protected function getTags()
    {
        return $this->tags->getAllTitle();
    }
}
