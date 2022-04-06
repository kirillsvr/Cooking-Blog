<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'category' => 'nullable',
            'sort' => 'nullable',
            'tag' => 'nullable',
            'author' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable',
            'search' => 'nullable',
            'level' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'category' => isset($this->category) ? explode(",", $this->category) : null,
            'tag' => isset($this->tag) ? explode(",", $this->tag) : null,
            'level' => isset($this->level) ? explode(",", $this->level) : null,
            'sort' => isset($this->sort) ? explode("_", $this->sort) : null,
        ]);
    }
}
