<?php

namespace App\Actions\Search;

use App\Models\Post;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchIndexAction
{
    private int $currentPage;
    private int $elementPerPage;

    public function execute(string $data)
    {
        $this->getCurrentPage();
        $this->gerElementsPerPage();

        $recipes = Recipe::where('title', 'LIKE', "%{$data}%")->skip(($this->currentPage - 1) * $this->elementPerPage)->limit(config('settingsAdmin.elements_on_search_page'))->latest()->get();
        $posts = Post::where('title', 'LIKE', "%{$data}%")->skip(($this->currentPage - 1) * $this->elementPerPage)->limit(config('settingsAdmin.elements_on_search_page'))->latest()->get();

        $allModels = (collect([$posts, $recipes]))->flatten(0);
        $collection = (new Collection($allModels))->sortBy('created_at');

        $allThreeTypesOfModels = $collection->slice(($this->currentPage - 1) * $this->elementPerPage, $this->elementPerPage)->all();

        $allModels = new LengthAwarePaginator($allThreeTypesOfModels, count($collection), $this->elementPerPage);
        $allModels->withPath('');

        return compact('allModels', 'data');

    }

    private function getCurrentPage(): void
    {
        $this->currentPage = LengthAwarePaginator::resolveCurrentPage();
    }

    private function gerElementsPerPage(): void
    {
        $this->elementPerPage = config('settingsAdmin.elements_on_search_page');
    }
}
