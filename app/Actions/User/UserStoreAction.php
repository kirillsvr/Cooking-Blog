<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\ImageSaveService;
use function bcrypt;

class UserStoreAction
{
    protected $service;

    public function __construct(ImageSaveService $service)
    {
        $this->service = $service;
    }

    public function execute(array $data): void
    {
        $data['image'] = $this->service->uploadImage($data['image'], 'image');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
    }
}
