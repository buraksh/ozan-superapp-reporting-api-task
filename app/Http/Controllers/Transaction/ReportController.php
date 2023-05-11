<?php

namespace App\Http\Controllers\Transaction;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\ReportRequest;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function __invoke(ReportRequest $request, TransactionRepositoryInterface $repository): JsonResponse
    {
        return response()->json([
            'status'   => Status::APPROVED,
            'response' => $repository->getReport($request),
        ]);
    }
}
