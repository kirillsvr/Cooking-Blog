<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeCategory extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'thumbnail'];

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request)
    {
        Storage::delete($request->thumbnail);
        $folder = date('Y-m-d');
        return $request->file('thumbnail')->store("images/{$folder}");
    }
}
