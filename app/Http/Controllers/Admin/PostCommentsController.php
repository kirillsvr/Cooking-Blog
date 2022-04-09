<?php

namespace App\Http\Controllers\Admin;

use App\Actions\PostComments\PostCommentsDeleteAction;
use App\Actions\PostComments\PostCommentsDisableAction;
use App\Actions\PostComments\PostCommentsEnableAction;
use App\Actions\PostComments\PostCommentsIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function index(string $id, PostCommentsIndexAction $action)
    {
        return view('admin.comments.index', $action->execute($id));
    }

    public function enable(Request $request, string $id, PostCommentsEnableAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно опубликован', 200);
    }

    public function disable(Request $request, string $id, PostCommentsDisableAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно скрыт', 200);
    }

    public function destroy(Request $request, string $id, PostCommentsDeleteAction $action)
    {
        $action->execute($request->id, $id);
        return response()->json('Комментарий успешно удален', 200);
    }
}
