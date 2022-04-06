<?php

namespace App\Repositories;

use App\Models\Raiting;
use Illuminate\Database\Eloquent\Model;

class RaitingRepository
{
    public static function checkReEvaluation(string $id): Model|null
    {
        return Raiting::where('recipe_id', $id)->where('unique_user_id', session('unique'))->first();
    }
}
