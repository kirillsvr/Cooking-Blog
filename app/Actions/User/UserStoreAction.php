<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\ImageSaveService;
use function bcrypt;

class UserStoreAction
{
    public function execute(array $data): void
    {
        $data['image'] = ImageSaveService::uploadImage($data['image'], 'image');
        User::create($data);
    }
}
