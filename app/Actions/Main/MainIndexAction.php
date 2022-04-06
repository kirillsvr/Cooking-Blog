<?php

namespace App\Actions\Main;


use App\Models\HomeRecipe;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\User;
use Drandin\DeclensionNouns\Facades\DeclensionNoun;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class MainIndexAction
{
    public function execute()
    {
        $categories = RecipeCategory::all();
        $recentRecipe = Recipe::with('recipeCategory', 'user', 'raiting')->orderBy('created_at')->limit(3)->get();
        $popularRecipe = Recipe::with('recipeCategory', 'user', 'raiting')->orderBy('views')->limit(5)->get();
        $popularPost = Post::with('category', 'comments')->orderBy('views')->limit(3)->get();
        $banners = $this->generateBanners(HomeRecipe::with('recipe')->get());
        $countRecipes = Recipe::count();
        $countPosts = Post::count();
        $countAuthors = User::whereIn('role_id', [2,3])->count();

        return compact(
            'categories',
            'recentRecipe',
            'popularRecipe',
            'popularPost',
            'banners',
            'countRecipes',
            'countPosts',
            'countAuthors',
        );
    }

    private function generateBanners(Collection $banners): Collection
    {
        foreach ($banners as &$banner){
            $banner->recipe->category = $banner->recipe->recipeCategory()->get();
            $banner->recipe->comments = $banner->recipe->recipeComments()->get();
            $banner->recipe->user = $banner->recipe->user()->get();
        }

        return $banners;
    }
}
