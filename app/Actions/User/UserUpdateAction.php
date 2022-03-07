<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\ImageSaveService;
use function bcrypt;

class UserUpdateAction
{
    protected $service;

    public function __construct(ImageSaveService $service)
    {
        $this->service = $service;
    }

    public function execute(array $data, User $user): void
    {
        if (empty($data['password'])) unset($data['password']);
        else $data['password'] = bcrypt($data['password']);

        if (empty($data['image'])) unset($data['image']);
        else $data['image'] = $this->service->uploadImage($data['image'], 'image', $user->image);

        $user->update($data);
    }
}
