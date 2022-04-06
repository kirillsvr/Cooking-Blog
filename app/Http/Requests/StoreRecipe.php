<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipe extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'prep_time' => 'required',
            'cook_time' => 'required',
            'skill_level' => 'required',
            'user_id' => 'nullable',
            'recipe_categories_id' => 'required',
            'caloric' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'ing' => 'required',
            'steps' => 'required',
            'carbohydrates' => 'required',
            'content' => 'required',
            'category_id' => 'integer',
            'thumbnail' => 'required|image',
            'tags' => 'nullable',
        ];
    }
}
