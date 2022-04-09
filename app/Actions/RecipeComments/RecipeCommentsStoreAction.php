<?php

namespace App\Actions\RecipeComments;

use App\Actions\AbstractCommentsStoreAction;
use App\Models\RecipeComments;
use Illuminate\Support\Facades\Auth;

class RecipeCommentsStoreAction extends AbstractCommentsStoreAction
{
    public function execute(array $data, string $id): void
    {
        if(Auth::user()) $data = $this->addAuthData($data);
        $this->create($this->modify($data, $id));
    }

    private function create(array $data): void
    {
        RecipeComments::create($data);
    }
}
