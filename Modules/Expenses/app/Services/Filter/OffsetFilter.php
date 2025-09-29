<?php

namespace Modules\Expenses\Services\Filter;

use Illuminate\Database\Eloquent\Builder;
use Modules\Expenses\Services\Filter\Filter;

class OffsetFilter extends Filter
{

    protected function applyFilter(Builder $builder, ...$args): Builder
    {
        if (request()->has('offset')) {
            return $builder->offset(request()->get('offset'));
        } else return $builder;
    }
}
