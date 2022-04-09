<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

abstract class AbstractCommentsStoreAction
{
    abstract public function execute(array $data, string $id): void;

    protected function modify(array $data, string $id): array
    {
        $data['post_id'] = $id;
        $data['parent'] = $data['parent'] ?? 0;

        return $data;
    }

    protected function addAuthData(array $data): array
    {
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;

        return $data;
    }
}
