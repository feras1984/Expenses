<?php

namespace Modules\Expenses\Services\Filter;

use Illuminate\Database\Eloquent\Builder;
use Modules\Expenses\Services\Filter\Filter;

class RangeFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('from') && request()->has('to')) {
            return $builder->whereBetween('expense_date', [request()->from, request()->to]);
        } else return $builder;
    }
}
