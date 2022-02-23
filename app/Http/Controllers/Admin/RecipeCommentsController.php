<?php

namespace App\Http\Controllers\Admin;

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
}
