<?php

namespace App\Actions\Recipe;

use App\Actions\AbstractRecipeAction;

class RecipeGetCategoriesTagsAuthorsAction extends AbstractRecipeAction
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
