<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('front.article.index');
    }

    public function show()
    {
        return view('front.article.show');
    }
}
