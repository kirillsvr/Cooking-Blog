<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RecipeCategoryController;
use App\Http\Controllers\Admin\RecipeCommentsController;
use App\Http\Controllers\Admin\RecipeTagController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StepsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Models\RecipeTags;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article', [ArticleController::class, 'show'])->name('article.show');

Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])
    ->name('recipe.index')
    ->where('id', '[a-zA-Z0-9_-]+');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
   Route::get('/', [MainController::class, 'index'])->name('admin.index');
   Route::resource('/categories', CategoryController::class);
   Route::resource('/tags', TagController::class);
   Route::resource('/recipe_tags', RecipeTagController::class);
   Route::resource('/posts', PostController::class);
   Route::resource('/recipe', \App\Http\Controllers\Admin\RecipeController::class);
   Route::resource('/recipe_category', RecipeCategoryController::class);
   Route::post('/recipe_comments/{id}/disable/', [RecipeCommentsController::class, 'disable'])->name('recipe_comments.disable');
   Route::post('/recipe_comments/{id}/enable/', [RecipeCommentsController::class, 'enable'])->name('recipe_comments.enable');
   Route::delete('/recipe_comments/{id}', [RecipeCommentsController::class, 'destroy'])->name('recipe_comments.delete');
   Route::get('/recipe_comments/{id}', [RecipeCommentsController::class, 'index'])->name('recipe_comments.show');
   Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
   Route::get('/about', [AboutPageController::class, 'edit'])->name('about.edit');
   Route::post('/about', [AboutPageController::class, 'update'])->name('about.update');
   Route::get('/contact', [ContactPageController::class, 'edit'])->name('contact.edit');
   Route::post('/contact', [ContactPageController::class, 'update'])->name('contact.update');
   Route::delete('/steps/{id}', [StepsController::class, 'deleteImage'])->name('steps.deleteImage');
   Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
   Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authLogin'])->name('auth');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
