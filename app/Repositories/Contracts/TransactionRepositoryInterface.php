<?php

namespace App\Repositories\Contracts;

use App\Models\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface TransactionRepositoryInterface
{
    public function findByIdWithCustomer(string $transactionId): ?Transaction;

    public function getReport(Request $request);

    public function getList(Request $request): LengthAwarePaginator;

    public function getDetails(string $transactionId): ?Transaction;
}
