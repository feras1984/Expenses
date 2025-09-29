<?php

namespace Modules\Expenses\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pipeline\Pipeline;
use Modules\Expenses\Models\Expense;
use Modules\Expenses\Services\Filter\CategoryFilter;
use Modules\Expenses\Services\Filter\FromDateFilter;
use Modules\Expenses\Services\Filter\LimitFilter;
use Modules\Expenses\Services\Filter\OffsetFilter;
use Modules\Expenses\Services\Filter\OrderByFilter;
use Modules\Expenses\Services\Filter\ToDateFilter;

class ExpenseRepository
{
    public function create(array $data): Expense
    {
        return Expense::create([
            'title' => $data['title'],
            'amount' => $data['amount'],
            'category' => $data['category'],
            'expense_date' => Carbon::parse($data['expense_date'])->format('Y-m-d'),
            'notes' => $data['notes'] ?? null,
        ]);
    }

    public function getAll(): Collection
    {
        $query = Expense::query();

        return app(Pipeline::class)
            ->send($query)
            ->through([
                LimitFilter::class,
                OffsetFilter::class,
                CategoryFilter::class,
                FromDateFilter::class,
                ToDateFilter::class,
                OrderByFilter::class,
            ])
            ->thenReturn()->latest()->get();
    }

    public function find(string $id): ?Expense
    {
        return Expense::find($id);
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update([
            'title' => $data['title'],
            'amount' => $data['amount'],
            'category' => $data['category'],
            'expense_date' => Carbon::parse($data['expense_date'])->format('Y-m-d'),
            'notes' => $data['notes'] ?? null,
        ]);
        return $expense;
    }

    public function delete(Expense $expense): bool
    {
        return $expense->delete();
    }
}
