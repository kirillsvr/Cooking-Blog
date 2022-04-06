<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const CATEGORY = 'category';
    public const TAG = 'tag';
    public const AUTHOR = 'author';
    public const MONTH = 'month';
    public const YEAR = 'year';
    public const SEARCH = 'search';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::TAG => [$this, 'tag'],
            self::AUTHOR => [$this, 'author'],
            self::MONTH => [$this, 'month'],
            self::YEAR => [$this, 'year'],
            self::SEARCH => [$this, 'search'],
        ];
    }

    public function category(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function tag(Builder $builder, $value)
    {
        $builder->rightJoin('post_tag', 'post.id', '=', 'post_tag.post_id')->where('tag_id', $value);
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy($value);
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }

    public function month(Builder $builder, $value)
    {
        $builder->whereMonth('created_at', $value);
    }

    public function year(Builder $builder, $value)
    {
        $builder->whereYear('created_at', $value);
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('title', 'LIKE', "%{$value}%");
    }
}
