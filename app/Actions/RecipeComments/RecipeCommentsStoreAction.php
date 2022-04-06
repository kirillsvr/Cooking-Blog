<?php

namespace App\Actions\RecipeComments;

use App\Models\RecipeComments;
use Illuminate\Support\Facades\Auth;

class RecipeCommentsStoreAction
{
    public function execute(array $data, string $id)
    {
        if(Auth::user()) $data = $this->addAuthData($data);
        $data['recipe_id'] = $id;
        $data['parent'] = $data['parent'] ?? 0;
        RecipeComments::create($data);
    }

    private function addAuthData(array $data): array
    {
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;

        return $data;
    }
}
