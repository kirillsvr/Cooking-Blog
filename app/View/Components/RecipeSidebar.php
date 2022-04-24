<?php

namespace App\View\Components;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeTags;
use App\Models\Tag;
use App\Models\User;
use App\Repositories\RecipeRepository;
use App\Repositories\RecipeTagRepository;
use Illuminate\View\Component;

class RecipeSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $admin = User::where('role_id', '3')->first();
        $categories = RecipeCategory::all();
        $tags = RecipeTagRepository::tagWithCountPosts();
        $recipes = RecipeRepository::fourMorePopularRecipes();
        return view('components.recipe-sidebar', compact(
            'categories',
            'tags',
            'recipes',
            'admin'
        ));
    }
}
