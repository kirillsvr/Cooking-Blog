<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostComments;
use App\Models\PostComments;
use Illuminate\Http\Request;
use PostCommentsStoreAction;

class PostCommentsController extends Controller
{
    public function store(StorePostComments $request, string $id, PostCommentsStoreAction $action)
    {
        $action->execute($request->validated(), $id);
        return response()->json('OK', 200);
    }
}
