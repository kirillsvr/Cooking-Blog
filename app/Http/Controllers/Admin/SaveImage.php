<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageSaveService;
use Illuminate\Http\Request;

class SaveImage extends Controller
{
    public function store(Request $request)
    {
        @header('Content-type: text/html; charset=utf-8');
        echo "<script>window.parent.CKEDITOR.tools.callFunction('" . $request->input('CKEditorFuncNum') . "','" . asset('/uploads/' . ImageSaveService::uploadImage($request->upload)) . "', 'Изображение успешно загружено')</script>";
    }
}
