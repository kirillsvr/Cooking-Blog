<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'id', 'skill_level');
    }
}
