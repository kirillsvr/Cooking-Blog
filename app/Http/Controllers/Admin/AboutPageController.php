<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        return view('admin.pages.about');
    }

    public function update(Request $request)
    {

    }
}
