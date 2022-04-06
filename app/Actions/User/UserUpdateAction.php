<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\ImageSaveService;
use function bcrypt;

class UserUpdateAction
{
    public function execute(array $data, User $user): void
    {
        if (empty($data['password'])) unset($data['password']);

        if (empty($data['image'])) unset($data['image']);
            else $data['image'] = ImageSaveService::uploadImage($data['image'], $user->image);

        $user->update($data);
    }
}
