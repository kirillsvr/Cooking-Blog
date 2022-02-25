<?php

namespace App\Actions;

class GetCategoriesTagsAuthorsAction extends AbstractRecipeAction
{
    public function execute(): array
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $authors = $this->getAuthors();

        return compact(
          'categories',
          'tags',
          'authors'
        );
    }
}
