<?php

namespace App\Actions\User;

use App\Models\User;

class UserFrontShowAction
{
    public function execute(int $id)
    {
        $user = User::with('recipes', 'posts')->where('id', $id)->first();
        $recipes = $user->recipes()->with('recipeCategory')->limit(4)->get();
        $posts = $user->posts()->with('category', 'tags')->limit(4)->get();

        return compact(
            'user',
            'recipes',
            'posts'
        );
    }
}
