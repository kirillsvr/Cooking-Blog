<?php

namespace App\Http\Controllers\Admin;

use App\Actions\StepsDeleteImageAction;
use App\Http\Controllers\Controller;
use App\Models\RecipeSteps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StepsController extends Controller
{
    public function deleteImage($id, StepsDeleteImageAction $action)
    {
        $action->execute($id);
        return response()->json('OK', 200);
    }
}
