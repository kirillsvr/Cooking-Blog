<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbout;
use App\Models\About;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $about = About::find(1);
        return view('admin.pages.about', compact('about'));
    }

    public function update(StoreAbout $request)
    {
        $about = About::find(1);
        $about->update($request->validated());
        return response()->json('Страница "О нас" обновлена', 200);
    }
}
