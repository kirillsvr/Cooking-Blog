<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RecipeCategoryController;
use App\Http\Controllers\Admin\RecipeCommentsController;
use App\Http\Controllers\Admin\RecipeTagController;
use App\Http\Controllers\Admin\SaveImage;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StepsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostCommentsController;
use App\Http\Controllers\Front\RaitingController;
use App\Http\Controllers\Front\RecipeController;
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
Route::post('/registerWithOutPass', [HomeController::class, 'register'])->name('registerWithOutPass');
Route::get('/blog/live-search', [BlogController::class, 'liveSearch']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/article/{id}', [ArticleController::class, 'show'])
    ->name('article.show')
    ->where('id', '[a-zA-Z0-9_-]+');
Route::post('/comments/{id}', [PostCommentsController::class, 'store'])->name('post_comments.store');
Route::get('/about', [\App\Http\Controllers\Front\AboutPageController::class, 'index'])->name('about');
Route::get('/contact', [\App\Http\Controllers\Front\ContactPageController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\Front\ContactPageController::class, 'message'])->name('contact.message');
Route::get('/recipes', [RecipeController::class, 'index'])->name('front.recipes.index');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])
    ->name('front.recipe.index')
    ->where('id', '[a-zA-Z0-9_-]+');
Route::post('/recipeComments/{id}', [\App\Http\Controllers\Front\RecipeCommentsController::class, 'store'])->name('comments.store');
Route::get('/authors', [UserController::class, 'index'])->name('authors.index');
Route::get('/author/{id}', [UserController::class, 'show'])->name('authors.show');
Route::get('/raiting/{id}', [RaitingController::class, 'store'])->name('raiting.store');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
   Route::get('/', [MainController::class, 'index'])->name('admin.index');
   Route::resource('/categories', CategoryController::class);
   Route::resource('/tags', TagController::class);
   Route::resource('/recipe_tags', RecipeTagController::class);
   Route::resource('/posts', PostController::class);
   Route::resource('/recipe', \App\Http\Controllers\Admin\RecipeController::class);
   Route::resource('/recipe_category', RecipeCategoryController::class);
   Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
   Route::get('/about', [AboutPageController::class, 'edit'])->name('about.edit');
   Route::post('/about', [AboutPageController::class, 'update'])->name('about.update');
   Route::get('/contact', [ContactPageController::class, 'edit'])->name('contact.edit');
   Route::post('/contact', [ContactPageController::class, 'update'])->name('contact.update');
   Route::delete('/steps/{id}', [StepsController::class, 'deleteImage'])->name('steps.deleteImage');
   Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
   Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
   Route::get('/search/live-search', [SearchController::class, 'liveSearch'])->name('search.live');
   Route::get('/search', [SearchController::class, 'index'])->name('search.index');
   Route::post('/upload_image', [SaveImage::class, 'store'])->name('upload.image');
   Route::group(['prefix' => 'recipe_comments'], function (){
       Route::put('/{id}/disable/', [RecipeCommentsController::class, 'disable'])->name('recipe_comments.disable');
       Route::put('/{id}/enable/', [RecipeCommentsController::class, 'enable'])->name('recipe_comments.enable');
       Route::delete('/{id}', [RecipeCommentsController::class, 'destroy'])->name('recipe_comments.delete');
       Route::get('/{id}', [RecipeCommentsController::class, 'index'])->name('recipe_comments.show');
   });
   Route::group(['prefix' => 'post_comments'], function (){
       Route::put('/{id}/disable/', [\App\Http\Controllers\Admin\PostCommentsController::class, 'disable'])->name('post_comments.disable');
       Route::put('/{id}/enable/', [\App\Http\Controllers\Admin\PostCommentsController::class, 'enable'])->name('post_comments.enable');
       Route::delete('/{id}', [\App\Http\Controllers\Admin\PostCommentsController::class, 'destroy'])->name('post_comments.delete');
       Route::get('/{id}', [\App\Http\Controllers\Admin\PostCommentsController::class, 'index'])->name('post_comments.show');
   });
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authLogin'])->name('auth');
    Route::get('/forgot-password', [UserController::class, 'forgot'])->name('password.request');
    Route::post('/forgot-password', [UserController::class, 'forgotStore'])->name('password.email');
    Route::get('/reset-password/{token}', [UserController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'resetUpdate'])->name('password.update');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
