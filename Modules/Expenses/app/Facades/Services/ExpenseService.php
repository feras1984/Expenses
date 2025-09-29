<?php

namespace Modules\Expenses\Facades\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;
use Modules\Expenses\app\Models\Expense;
use Modules\Expenses\Services\ExpenseService as ExpenseServ;

/**
 * @method static createExpense(array $data): Expense
 * @method static getExpenses(?string $category = null, ?array $dateRange = null): Collection
 * @method static getExpenseById(string $id): Expense | null
 * @method static updateExpense(string $id, array $data): ?Expense
 * @method static deleteExpense(string $id): bool
 */
class ExpenseService extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ExpenseServ::class;
    }
}
