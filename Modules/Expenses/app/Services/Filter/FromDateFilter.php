<?php

namespace Modules\Expenses\Services\Filter;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class FromDateFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('from')) {
            return $builder->where('expense_date', '>=', request()->get('from') );
        } else return $builder;
    }
}
