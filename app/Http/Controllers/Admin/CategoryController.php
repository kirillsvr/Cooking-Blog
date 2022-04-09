<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(config('settingsAdmin.categories_on_page'));
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategory $request)
    {
        Category::create($request->validated());
        return response()->json('Категория успешно добавлена', 200);
    }

    public function show($id)
    {

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategory $request, Category $category)
    {
        $category->slug = null;
        $category->update($request->all());
        return response()->json('Категория успешно изменена', 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('Категория успешно удалена', 200);
    }
}
