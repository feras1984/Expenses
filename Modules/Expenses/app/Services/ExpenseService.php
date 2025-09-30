<?php

namespace Modules\Expenses\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Expenses\Events\ExpenseCreatedEvent;
use Modules\Expenses\Facades\Repositories\ExpenseRepository;
use Modules\Expenses\Models\Expense;

class ExpenseService
{
    public function createExpense(array $data): Expense
    {
        $expense = ExpenseRepository::create($data);
        event(new ExpenseCreatedEvent($expense));
        return $expense;
    }

    public function getExpenses(): Collection
    {
        return ExpenseRepository::getAll();
    }

    public function getExpenseById(int | string $id): Expense | null
    {
        return ExpenseRepository::find($id);
    }

    public function updateExpense(int | string $id, array $data): ?Expense
    {
        $expense = ExpenseRepository::find($id);
        if (!$expense) {
            return null;
        }
        return ExpenseRepository::update($expense, $data);
    }

    public function deleteExpense(int | string $id): bool
    {
        $expense = ExpenseRepository::find($id);
        if (!$expense) {
            return false;
        }
        return ExpenseRepository::delete($expense);
    }
}
