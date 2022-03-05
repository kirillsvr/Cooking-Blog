<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user)
    {
        return $user->role == 3;
    }

    public function update(User $user)
    {
        return $user->role == 3;
    }
}
