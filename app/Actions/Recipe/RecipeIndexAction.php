<?php

namespace App\Actions\Recipe;


use App\Actions\AbstractRecipeAction;
use App\Http\Filters\AdminRecipeFilter;
use App\Models\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;
use function app;
use function config;

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
        $recipes = Recipe::filter($filter)->with('recipeComments')->paginate(config('settings.recipe_on_page'));

        foreach ($recipes as &$recipe){
            $recipe['countComm'] = $recipe->recipeComments->count();

            foreach ($recipe->recipeComments as $comment){
                if ($comment->is_published == 0){
                    $recipe['newComm'] = 1;
                    break;
                }
            }
        }

        return $recipes;
    }
}
