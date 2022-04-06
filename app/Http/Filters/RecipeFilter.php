<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class RecipeFilter extends AbstractFilter
{
    public const CATEGORY = 'category';
    public const SORT = 'sort';
    public const TAG = 'tag';
    public const AUTHOR = 'author';
    public const LEVEL = 'level';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::TAG => [$this, 'tag'],
            self::SORT => [$this, 'sort'],
            self::AUTHOR => [$this, 'author'],
            self::LEVEL => [$this, 'level'],
        ];
    }

    public function category(Builder $builder, $value)
    {
        $builder->whereIn('recipe_categories_id', $value);
    }

    public function tag(Builder $builder, $value)
    {
        $builder->select('recipes.*')->rightJoin('recipe_tags_relation', 'recipes.id', '=', 'recipe_tags_relation.recipe_id')->whereIn('recipe_tags_id', $value);
    }

    public function sort(Builder $builder, $value)
    {
        if ($value[0] == 'date') $value[0] = 'created_at';
        $builder->orderBy($value[0], $value[1] ?? 'DESC');
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }

    public function level(Builder $builder, $value)
    {
        $builder->where('skill_level', $value);
    }
}
