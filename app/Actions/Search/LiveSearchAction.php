<?php

namespace App\Actions\Search;

use App\Models\Post;
use App\Models\Recipe;
use App\Repositories\PostRepository;
use App\Repositories\RecipeRepository;
use Illuminate\Support\Arr;

class LiveSearchAction
{
    public function execute(string $data): array
    {
        return $this->sortArray(
            $this->getPost($data),
            $this->getRecipe($data)
        );
    }

    private function getRecipe(string $data): array
    {
        return $this->modifyArray(RecipeRepository::getRecipeFromSearch($data)->toArray(), 'recipe');
    }

    private function getPost(string $data): array
    {
        return $this->modifyArray(PostRepository::getPostFromSearch($data)->toArray(), 'posts');
    }

    private function modifyArray(array $data, string $nameModel): array
    {
        return array_map(function ($value) use ($nameModel){
            $value['model'] = $nameModel;
            return $value;
        }, $data);
    }

    private function sortArray(array $posts, array $recipes): array
    {
        return array_values(Arr::sort(array_merge($posts, $recipes), function ($value) {
            return $value['title'];
        }));
    }
}
