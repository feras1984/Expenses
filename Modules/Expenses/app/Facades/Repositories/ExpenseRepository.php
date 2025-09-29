<?php

namespace Modules\Expenses\Facades\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;
use Modules\Expenses\Repositories\ExpenseRepository as ExpenseRepo;
use Modules\Expenses\Models\Expense;

/**
 * @method static create(array $data): Expense
 * @method static getAll(?string $category = null, ?array $dateRange = null): Collection
 * @method static find(string $id): ?Expense
 * @method static update(Expense $expense, array $data): Expense
 * @method static delete(Expense $expense): bool
 */
class ExpenseRepository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ExpenseRepo::class;
    }
}
