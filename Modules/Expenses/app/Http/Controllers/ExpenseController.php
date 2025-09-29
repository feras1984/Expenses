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
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
//        return view('expenses::index');
        try {
            return response()->json(ExpenseService::getExpenses());
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
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request): JsonResponse
    {
        try {
            $data = $request->all();
            return response()->json(ExpenseService::createExpense($data));
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show(int | string $id): JsonResponse
    {
        try {
            return response()->json(ExpenseService::getExpenseById($id));
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
     */
    public function update(ExpenseRequest $request, int | string $id): JsonResponse
    {
        try {
            return response()->json(ExpenseService::updateExpense($id, $request->all()));
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int | string $id): JsonResponse
    {
        try {
            return response()->json(ExpenseService::deleteExpense($id));
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'error' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
