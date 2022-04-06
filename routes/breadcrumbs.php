<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('admin.index'));
});

// Home > [Breadcrumb]
Breadcrumbs::for('admin.breadcrumb', function (BreadcrumbTrail $trail, string $title, string|null $route = null) {
    $trail->parent('admin.home');
    $trail->push($title, !is_null($route) ? route($route) : null);
});

// Home > Posts > [Post]
Breadcrumbs::for('admin.post.edit', function (BreadcrumbTrail $trail, string $id) {
    $post = \App\Models\Post::find($id);
    $trail->parent('admin.breadcrumb', 'Статьи', 'posts.index');
    $trail->push($post->title, route('posts.edit', $post->id));
});

// Home > Posts > Create
Breadcrumbs::for('admin.post.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Статьи', 'posts.index');
    $trail->push('Создание статьи', route('posts.create'));
});

// Home > Recipes > [Category]
Breadcrumbs::for('admin.recipe_category', function (BreadcrumbTrail $trail, \App\Models\RecipeCategory $category) {
    $trail->parent('admin.breadcrumb', 'Рецепты', 'recipe.index');
    $trail->push($category->title, '/admin/recipe?category=' . $category->id);
});

// Home > Recipes > [Category] > [Recipe]
Breadcrumbs::for('admin.recipe.edit', function (BreadcrumbTrail $trail, string $id) {
    $recipe = \App\Models\Recipe::find($id);
    $category = \App\Models\RecipeCategory::find($recipe->recipe_categories_id);
    $trail->parent('admin.recipe_category', $category);
    $trail->push($recipe->title, route('recipe.edit', $recipe->id));
});

// Home > Recipes > [Recipe]
Breadcrumbs::for('admin.recipe', function (BreadcrumbTrail $trail, string $id) {
    $recipe = \App\Models\Recipe::find($id);
    $trail->parent('admin.breadcrumb', 'Рецепты', 'recipe.index');
    $trail->push($recipe->title, route('recipe.edit', $recipe->id));
});

// Home > Recipes > Create
Breadcrumbs::for('admin.recipe.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Рецепты', 'recipe.index');
    $trail->push("Создание рецепта");
});

// Home > Users > [Edit|Show]
Breadcrumbs::for('admin.user', function (BreadcrumbTrail $trail, string $id) {
    $user = \App\Models\User::find($id);
    $trail->parent('admin.breadcrumb', 'Пользователи', 'users.index');
    $trail->push($user->name);
});

// Home > Users > Create
Breadcrumbs::for('admin.user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Пользователи', 'users.index');
    $trail->push("Создание пользователя");
});

// Home > Tags > [Tag]
Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail, string $id) {
    $tag = \App\Models\Tag::find($id);
    $trail->parent('admin.breadcrumb', 'Тэги', 'tags.index');
    $trail->push($tag->title, route('tags.edit', $tag->id));
});

// Home > Tags > Create
Breadcrumbs::for('admin.tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Тэги', 'tags.index');
    $trail->push("Создание категории");
});

// Home > Categories > Create
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Категории', 'categories.index');
    $trail->push("Создание категории");
});

// Home > Categories > [Category]
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, string $id) {
    $category = \App\Models\Category::find($id);
    $trail->parent('admin.breadcrumb', 'Категории', 'categories.index');
    $trail->push($category->title, route('categories.edit', $category->id));
});

// Home > RecipeCategories > Create
Breadcrumbs::for('admin.recipe_categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Категории рецептов', 'recipe_category.index');
    $trail->push("Создание категории");
});

// Home > RecipeCategories > [RecipeCategory]
Breadcrumbs::for('admin.recipe_categories.edit', function (BreadcrumbTrail $trail, string $id) {
    $category = \App\Models\RecipeCategory::find($id);
    $trail->parent('admin.breadcrumb', 'Категории рецептов', 'recipe_category.index');
    $trail->push($category->title);
});

// Home > RecipeTags > Create
Breadcrumbs::for('admin.recipe_tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.breadcrumb', 'Тэги рецептов', 'recipe_tags.index');
    $trail->push("Создание тэга рецептов");
});

// Home > RecipeTags > [RecipeTag]
Breadcrumbs::for('admin.recipe_tags.edit', function (BreadcrumbTrail $trail, string $id) {
    $tag = \App\Models\RecipeTags::find($id);
    $trail->parent('admin.breadcrumb', 'Тэги рецептов', 'recipe_tags.index');
    $trail->push($tag->title);
});

// Home > Recipes > [Recipe] > Comments
Breadcrumbs::for('admin.comments', function (BreadcrumbTrail $trail, string $id) {
    $trail->parent('admin.recipe', $id);
    $trail->push('Комментарии');
});




// Home
Breadcrumbs::for('front.home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Home > [Breadcrumb]
Breadcrumbs::for('front.breadcrumb', function (BreadcrumbTrail $trail, string $title, string|null $route = null) {
    $trail->parent('front.home');
    $trail->push($title, !is_null($route) ? route($route) : null);
});

// Home > Blog > [Article]
Breadcrumbs::for('front.article', function (BreadcrumbTrail $trail, string $id) {
    $post = \App\Models\Post::where('slug', $id)->first();
    $trail->parent('front.breadcrumb', 'Блог', 'blog.index');
    $trail->push($post->title, route('article.show', $post->slug));
});

// Home > Recipes > [Recipe]
Breadcrumbs::for('front.recipe', function (BreadcrumbTrail $trail, string $id) {
    $recipe = \App\Models\Recipe::where('slug', $id)->first();
    $trail->parent('front.breadcrumb', 'Рецепты', 'front.recipes.index');
    $trail->push($recipe->title, route('front.recipe.index', $recipe->slug));
});

// Home > Authors > [Author]
Breadcrumbs::for('front.author', function (BreadcrumbTrail $trail, string $id) {
    $author = \App\Models\User::find($id);
    $trail->parent('front.breadcrumb', 'Авторы', 'authors.index');
    $trail->push($author->name, route('authors.show', $author->id));
});
