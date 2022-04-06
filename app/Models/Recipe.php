<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    use Sluggable;
    use Filterable;

    protected $fillable = [
        'title',
        'prep_time',
        'cook_time',
        'skill_level',
        'user_id',
        'content',
        'recipe_categories_id',
        'thumbnail',
        'caloric',
        'protein',
        'fat',
        'carbohydrates',
    ];

    public function recipeCategory()
    {
        return $this->belongsTo(RecipeCategory::class, 'recipe_categories_id', 'id');
    }

    public function recipeSteps()
    {
        return $this->hasMany(RecipeSteps::class);
    }

    public function recipeImages()
    {
        return $this->hasMany(RecipeImages::class);
    }

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredients::class);
    }

    public function recipeTags()
    {
        return $this->belongsToMany(RecipeTags::class, 'recipe_tags_relation', 'recipe_id', 'recipe_tags_id')->withTimestamps();
    }

    public function recipeComments()
    {
        return $this->hasMany(RecipeComments::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function raiting()
    {
        return $this->hasMany(Raiting::class);
    }

    public function level()
    {
        return $this->belongsTo(RecipeLevel::class, 'skill_level', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
