<?php

namespace App\Actions\PostComments;

use App\Actions\AbstractCommentsStoreAction;
use App\Models\PostComments;
use Illuminate\Support\Facades\Auth;

class PostCommentsStoreAction extends AbstractCommentsStoreAction
{
    public function execute(array $data, string $id): void
    {
        if(Auth::user()) $data = $this->addAuthData($data);
        $this->create($this->modify($data, $id));
    }

    private function create(array $data): void
    {
        PostComments::create($data);
    }
}
