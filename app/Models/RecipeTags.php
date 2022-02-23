<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeTags extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_tags_relation','recipe_tags_id', 'recipe_id');
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
