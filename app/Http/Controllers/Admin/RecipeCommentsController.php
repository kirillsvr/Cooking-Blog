<?php

namespace App\Http\Controllers\Admin;

use App\Actions\RecipeComments\RecipeCommentsDeleteAction;
use App\Actions\RecipeComments\RecipeCommentsDisableAction;
use App\Actions\RecipeComments\RecipeCommentsEnableAction;
use App\Actions\RecipeComments\RecipeCommentsIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeCommentsController extends Controller
{
    public function index(string $id, RecipeCommentsIndexAction $action)
    {
        return view('admin.recipe_comments.index', $action->execute($id));
    }

    public function enable(Request $request, $id, RecipeCommentsEnableAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно опубликован', 200);
    }

    public function disable(Request $request, $id, RecipeCommentsDisableAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно скрыт', 200);
    }

    public function destroy(Request $request, $id, RecipeCommentsDeleteAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно удален', 200);
    }
}
