<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecipeSteps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StepsController extends Controller
{
    public function deleteImage($id)
    {
        $step = RecipeSteps::find($id);
        Storage::delete($step->image);
        $step->image = null;
        $step->save();
        return response()->json('OK', 200);
    }
}
