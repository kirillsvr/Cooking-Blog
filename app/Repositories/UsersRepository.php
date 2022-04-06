<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository
{
    public static function usersWithAccessAdminPanel(): Collection
    {
        return User::whereIn('role_id', [2, 3])->get();
    }

    public static function usersWithAccessAndPostRecipe(): Collection
    {
        return User::with('posts', 'recipes')->whereIn('role_id', [2,3])->get();
    }
}
