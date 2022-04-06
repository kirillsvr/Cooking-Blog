<?php

namespace App\Actions\Search;

use App\Models\Post;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchIndexAction
{
    public function execute(string $data)
    {
        $current_page = LengthAwarePaginator::resolveCurrentPage();
        $per_page = config('settingsAdmin.elements_on_search_page');

        $recipes = Recipe::where('title', 'LIKE', "%{$data}%")->skip(($current_page - 1) * $per_page)->limit(config('settingsAdmin.elements_on_search_page'))->latest()->get();
        $posts = Post::where('title', 'LIKE', "%{$data}%")->skip(($current_page - 1) * $per_page)->limit(config('settingsAdmin.elements_on_search_page'))->latest()->get();

        $allModels = (collect([$posts, $recipes]))->flatten(0);
        $collection = (new Collection($allModels))->sortBy('created_at');

        $all_three_types_of_models = $collection->slice(($current_page - 1) * $per_page, $per_page)->all();

        $allModels = new LengthAwarePaginator($all_three_types_of_models, count($collection), $per_page);
        $allModels->withPath('');

        return compact('allModels', 'data');

    }
}
