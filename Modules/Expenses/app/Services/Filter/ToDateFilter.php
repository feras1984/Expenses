<?php

namespace Modules\Expenses\Services\Filter;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Modules\Expenses\Services\Filter\Filter;

class ToDateFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('to')) {
            return $builder->whereDate('expense_date', '<=',
                Carbon::parse(request()->get('to')));
        } else return $builder;
    }
}
