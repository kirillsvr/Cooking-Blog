<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostComments;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeComments;
use App\Models\RecipeTags;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeRoles();
        $this->makeLevels();
        $this->makeSettings();
        $this->makeAdminSettings();
        User::factory(1)->create();
        Category::factory(6)->create();
        RecipeCategory::factory(6)->create();
        Tag::factory(6)->create();
        RecipeTags::factory(6)->create();
        Recipe::factory(25)->create();
        Post::factory(25)->create();
        PostComments::factory(40)->create();
        RecipeComments::factory(40)->create();
    }

    private function makeRoles(): void
    {
        DB::table('roles')->insert(['name' => 'Guest']);
        DB::table('roles')->insert(['name' => 'Author']);
        DB::table('roles')->insert(['name' => 'Admin']);
    }

    private function makeLevels(): void
    {
        DB::table('recipe_levels')->insert(['name' => 'Легко']);
        DB::table('recipe_levels')->insert(['name' => 'Средне']);
        DB::table('recipe_levels')->insert(['name' => 'Сложно']);
    }

    private function makeSettings(): void
    {
        DB::table('settings')->insert(['key' => 'post_on_page', 'name' => 'Постов на странице', 'value' => '6']);
        DB::table('settings')->insert(['key' => 'recipe_on_page', 'name' => 'Рецептов на странице', 'value' => '6']);
    }

    private function makeAdminSettings(): void
    {
        DB::table('setting_admins')->insert(['key' => 'post_on_page', 'name' => 'Постов на странице', 'value' => '12']);
        DB::table('setting_admins')->insert(['key' => 'recipe_on_page', 'name' => 'Рецептов на странице', 'value' => '12']);
        DB::table('setting_admins')->insert(['key' => 'elements_on_search_page', 'name' => 'Элементов на странице поиска', 'value' => '12']);
        DB::table('setting_admins')->insert(['key' => 'categories_on_page', 'name' => 'Категорий на странице', 'value' => '12']);
        DB::table('setting_admins')->insert(['key' => 'tags_on_page', 'name' => 'Тэгов на странице', 'value' => '12']);
    }
}
