<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class AdminRecipeFilter extends AbstractFilter
{
    public const CATEGORY = 'category';
    public const SORT = 'sort';
    public const TAG = 'tag';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::TAG => [$this, 'tag'],
            self::SORT => [$this, 'sort']
        ];
    }

    public function category(Builder $builder, $value)
    {
        $builder->where('recipe_categories_id', $value);
    }

    public function tag(Builder $builder, $value)
    {
        $builder->rightJoin('recipe_tags_relation', 'recipes.id', '=', 'recipe_tags_relation.recipe_id')->where('recipe_tags_id', $value);
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy($value);
    }
}
