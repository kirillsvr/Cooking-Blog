<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostTagRepository;
use App\Repositories\RecipeRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BlogSidebar extends Component
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
        $cats = PostCategoryRepository::getAllCategoriesWithRelations();
        $tags = PostTagRepository::tagWithCountPosts();
        $recipes = RecipeRepository::fourMorePopularRecipes();
        $admin = User::find(4);
        $archives = PostRepository::getArchivePostsMonthYears();
        return view('components.blog-sidebar', compact('cats', 'admin', 'tags', 'recipes', 'archives'));
    }
}
