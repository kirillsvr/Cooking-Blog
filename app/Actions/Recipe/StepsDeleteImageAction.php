<?php

namespace App\Actions\Recipe;

use App\Models\RecipeSteps;
use Illuminate\Support\Facades\Storage;

class StepsDeleteImageAction
{
    public function execute(string $id)
    {
        $step = RecipeSteps::find($id);
        Storage::delete($step->image);
        $step->image = null;
        $step->save();
    }
}
