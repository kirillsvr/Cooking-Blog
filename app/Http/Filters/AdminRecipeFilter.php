<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class AdminRecipeFilter extends AbstractFilter
{
    public const CATEGORY = 'category';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::SORT => [$this, 'sort']
        ];
    }

    public function category(Builder $builder, $value)
    {
        $builder->whereIn('recipe_categories_id', $value);
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy($value);
    }
}
