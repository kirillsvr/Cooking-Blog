<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeSteps extends Model
{
    use HasFactory;

    protected $fillable = ['step', 'info', 'image', 'recipe_id'];
    protected $table = 'recipe_steps';

    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
}
