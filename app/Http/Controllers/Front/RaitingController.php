<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRaiting;
use App\Models\Raiting;
use App\Repositories\RaitingRepository;
use Illuminate\Http\Request;

class RaitingController extends Controller
{
    public function store(StoreRaiting $request, string $id)
    {
        if (RaitingRepository::checkReEvaluation($id)){
            return response()->json('Вы уже оценили данный рецепт', 300);
        }
        $data = [
            'value' => $request->value,
            'recipe_id' => $id,
            'unique_user_id' => session('unique')
        ];
        Raiting::create($data);
        return response()->json('Ок', 200);
    }
}
