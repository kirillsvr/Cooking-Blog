<?php

namespace App\Actions\Recipe;


use App\Actions\AbstractRecipeAction;
use App\Http\Filters\RecipeFilter;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeLevel;
use App\Services\GetSettingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use function app;
use function config;

class RecipeIndexAction extends AbstractRecipeAction
{
    public function execute(array $data): array
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();
        $recipes = $this->getRecipeAfterFilter($data);
        $selectedCategory = $this->getCategory($data);
        $levels = RecipeLevel::all();

        return compact(
            'categories',
            'tags',
            'recipes',
            'selectedCategory',
            'levels',
            'data'
        );
    }

    private function getRecipeAfterFilter(array $data): LengthAwarePaginator
    {
        $filter = app()->make(RecipeFilter::class, ['queryParams' => array_filter($data)]);
        $recipes = $this->checkRoles($filter);

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

    private function checkRoles(RecipeFilter $filter): LengthAwarePaginator
    {
        if (Auth::user()->can('viewAny', Recipe::class)){
            return Recipe::filter($filter)->with('recipeComments', 'raiting')->paginate(GetSettingService::recipePaginate());
        }

        return Recipe::filter($filter)->with('recipeComments', 'raiting')->where('user_id', Auth::user()->id)->paginate(GetSettingService::recipePaginate());
    }

    private function getCategory(array $data): Collection|null
    {
        if (is_null($data['category'])) return null;

        return RecipeCategory::find($data['category']);
    }
}
