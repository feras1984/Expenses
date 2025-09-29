<?php

namespace Modules\Expenses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Expenses\Models\Expense;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

