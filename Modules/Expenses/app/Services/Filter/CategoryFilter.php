<?php

namespace Modules\Expenses\Services\Filter;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('categories')) {
            return $builder->whereIn('category', request()->get('categories'));
        } else return $builder;
    }
}
