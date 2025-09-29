<?php

namespace Modules\Expenses\Services\Filter;

use Illuminate\Database\Eloquent\Builder;
use Modules\Expenses\Services\Filter\Filter;

class OrderByFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        return $builder->orderBy('expense_date', 'desc');
    }
}
