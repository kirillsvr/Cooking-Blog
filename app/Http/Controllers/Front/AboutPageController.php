<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = About::first();
        $authors = UsersRepository::usersWithAccessAndPostRecipe();
        return view('front.pages.about', compact('about', 'authors'));
    }
}
