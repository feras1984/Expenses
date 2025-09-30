<?php

namespace Modules\Expenses\Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Modules\Expenses\Models\Expense;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    function test_can_create_expense() {
        $data = [
            'title' => 'Test title',
            'amount' => '20.00',
            'category' => 'Transportation',
            'expense_date' => '31-12-2020',
            'notes' => 'Some notes',
        ];

        $response = $this->json(
            'post',
            'expenses/api',
            $data);

        $response->assertStatus(200);
    }

    function test_can_validate_expense() {
        $data = [
//            'title' => 'Test title',
            'amount' => '20.00',
            'category' => 'Transportation',
            'expense_date' => '31-12-2020',
            'notes' => 'Some notes',
        ];

        $response = $this->json(
            'post',
            'expenses/api',
            $data);

        $response->assertStatus(422)
        ->assertJson(fn (AssertableJson $json) =>
        $json->where('status', 'error')
            ->etc()
        );
    }

    function test_can_update_expense() {
        $expense = Expense::query()->first();
        $expense->fill($data = [
            'title' => 'Test title',
            'amount' => '20.00',
            'category' => 'Rental', //We have changed category from Transportation to Rental
            'expense_date' => '31-12-2020',
            'notes' => 'Some notes',
        ]);
        $response = $this->json('put', 'expenses/api/' . $expense->id, $expense->toArray());
        $response->assertStatus(200)
            //We want to assert that the category has the new value
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('category', 'Rental')
                ->etc()
            );
    }

    function test_can_delete_expense() {
        $expense = Expense::query()->first();
        $response = $this->json('delete', 'expenses/api/' . $expense->id);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true);
            });
    }
}
