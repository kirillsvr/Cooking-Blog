<?php

namespace App\Actions\Recipe;

use App\Actions\AbstractRecipeAction;
use App\Models\RecipeLevel;

class RecipeGetCategoriesTagsAuthorsAction extends AbstractRecipeAction
{
    public function execute(): array
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $authors = $this->getAuthors();
        $levels = RecipeLevel::all();

        return compact(
          'categories',
          'tags',
            'authors',
            'levels'
        );
    }
}
