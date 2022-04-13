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

class GenerateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(1)->create();
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
}
