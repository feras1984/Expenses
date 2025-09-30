<?php

namespace Modules\Expenses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Expenses\Facades\Services\ExpenseService;
use Modules\Expenses\Http\Requests\ExpenseRequest;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     *
     * @group Expenses
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Lunch",
     *       "amount": 20,
     *       "category": "Food",
     *       "expense_date": "2025-09-30",
     *       "notes": "Team lunch"
     *     }
     *   ]
     * }
     *
     * @response 500 {
     *      "status": "error",
     *       "error": "Error Message"
     *  }
     */
    public function index(): JsonResponse
    {
//        return view('expenses::index');
        try {
            return response()->json(ExpenseService::getExpenses(), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
//        return view('expenses::create');
    }

    /**
     * Store a newly created expense in storage.
     *
     * @group Expenses
     *
     * @bodyParam title string required min:3 max:100 The title of the expense. Example: "Lunch"
     * @bodyParam amount numeric required min:1 The expense amount. Example: 20
     * @bodyParam category string required min:3 max:100 The expense category. Example: "Food"
     * @bodyParam expense_date date required The date of the expense. Example: "2025-09-30"
     * @bodyParam notes string optional Notes about the expense. Example: "Team lunch"
     *
     * @response 201 {
     *    "id": 1,
     *    "title": "Lunch",
     *    "amount": 20,
     *    "category": "Food",
     *    "expense_date": "2025-09-30",
     *    "notes": "Team lunch"
     *  }
     *
     * @response 422 {
     *     "status": "error",
     *      "errors": "The validation errors list"
     * }
     *
     * @response 500 {
     *      "status": "error",
     *       "error": "Error Message"
     *  }
     */

    public function store(ExpenseRequest $request): JsonResponse
    {
        try {
            $data = $request->all();
            return response()->json(
                ExpenseService::createExpense($data),
                Response::HTTP_CREATED,
            );
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the specified resource.
     *
     * @group Expenses
     *
     * @response 200 {
     *   "data": {
     *        "id": 1,
     *        "title": "Lunch",
     *        "amount": 20,
     *        "category": "Food",
     *        "expense_date": "2025-09-30",
     *        "notes": "Team lunch"
     *      }
     * }
     *
     * @response 500 {
     *      "status": "error",
     *       "error": "Error Message"
     *  }
     */
    public function show(int | string $id): JsonResponse
    {
        try {
            return response()->json(
                ExpenseService::getExpenseById($id),
                Response::HTTP_OK,
            );
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit($id)
//    {
//        return view('expenses::edit');
//    }

    /**
     * Update the specified resource in storage.
     * @group Expenses
     *
     * @bodyParam title string required min:3 max:100 The title of the expense. Example: "Lunch"
     * @bodyParam amount numeric required min:1 The expense amount. Example: 20
     * @bodyParam category string required min:3 max:100 The expense category. Example: "Food"
     * @bodyParam expense_date date required The date of the expense. Example: "2025-09-30"
     * @bodyParam notes string optional Notes about the expense. Example: "Team lunch"
     *
     * @response 200 {
     *     "id": 1,
     *     "title": "Lunch",
     *     "amount": 20,
     *     "category": "Food",
     *     "expense_date": "2025-09-30",
     *     "notes": "Team lunch"
     *   }
     *
     * @response 422 {
     *      "status": "error",
     *       "errors": "The validation errors list"
     *  }
     *
     * @response 500 {
     *      "status": "error",
     *       "error": "Error Message"
     *  }
     */
    public function update(ExpenseRequest $request, int | string $id): JsonResponse
    {
        try {
            return response()->json(
                ExpenseService::updateExpense($id, $request->all()),
                Response::HTTP_OK,
            );
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the expense from storage.
     * @group Expenses
     * @urlParam id int required The ID of the expense to delete. Example: 1
     *
     * @response 200 {
     *    "status": true/false,
     *  }
     *
     * @response 500 {
     *     "status": "error",
     *      "error": "Error Message"
     * }
     */
    public function destroy(int | string $id): JsonResponse
    {
        try {
            return response()->json(
                ['status' => ExpenseService::deleteExpense($id)],
                Response::HTTP_OK,
            );
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
