<?php

namespace App\Actions;


use App\Http\Filters\AdminRecipeFilter;
use App\Models\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeIndexAction extends AbstractRecipeAction
{
    public function execute($data): array
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $recipes = $this->getRecipeAfterFilter($data);

        return compact(
            'categories',
            'tags',
            'recipes'
        );
    }

    private function getRecipeAfterFilter($data): LengthAwarePaginator
    {
        $filter = app()->make(AdminRecipeFilter::class, ['queryParams' => array_filter($data)]);
        $recipes = Recipe::filter($filter)->with('recipeComments')->paginate(15);

        foreach ($recipes as &$recipe){
            $recipe['countComm'] = $recipe->recipeComments()->count();
        }

        return $recipes;
    }
}
