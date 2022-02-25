<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public function usersWithAccessAdminPanel()
    {
        return User::whereIn('role', [2, 3])->get();
    }
}
