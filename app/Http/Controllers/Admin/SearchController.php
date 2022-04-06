<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Search\LiveSearchAction;
use App\Actions\Search\SearchIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSearch;

class SearchController extends Controller
{
    public function index(StoreSearch $request, SearchIndexAction $action)
    {
        return view('admin.search.index', $action->execute($request->search));
    }

    public function liveSearch(StoreSearch $request, LiveSearchAction $action)
    {
        return $action->execute($request->search);
    }
}
