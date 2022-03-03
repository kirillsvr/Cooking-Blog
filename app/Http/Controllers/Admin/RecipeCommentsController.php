<?php

namespace App\Http\Controllers\Admin;

use App\Actions\RecipeCommentsDeleteAction;
use App\Actions\RecipeCommentsDisableAction;
use App\Actions\RecipeCommentsEnableAction;
use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeComments;
use App\Services\RecipeComments\CommentsService;
use Illuminate\Http\Request;

class RecipeCommentsController extends Controller
{
    protected $service;

    public function __construct(CommentsService $service)
    {
        $this->service = $service;
    }

    public function index($id)
    {
        $recipe = Recipe::find($id);
        $comments = $this->service->show($recipe);

        return view('admin.recipe_comments.index', compact('comments'));
    }

    public function enable(Request $request, $id, RecipeCommentsEnableAction $action)
    {
        $action->execute($request->id, $id, 1);
        return response()->json('OK', 200);
    }

    public function disable(Request $request, $id, RecipeCommentsDisableAction $action)
    {
        $action->execute($request->id, $id, 0);
        return response()->json('OK', 200);
    }

    public function destroy(Request $request, $id, RecipeCommentsDeleteAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('OK', 200);
    }
}
