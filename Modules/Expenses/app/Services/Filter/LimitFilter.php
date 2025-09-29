<?php

namespace Modules\Expenses\Services\Filter;

use Illuminate\Database\Eloquent\Builder;
use Modules\Expenses\Services\Filter\Filter;

class LimitFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('limit')) {
            return $builder->limit(request()->get('limit'));
        } else return $builder;
    }
}
