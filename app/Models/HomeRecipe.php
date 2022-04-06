<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeRecipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'recipe_id'];

    public function recipe()
    {
        return $this->hasOne(Recipe::class, 'id', 'recipe_id');
    }
}
