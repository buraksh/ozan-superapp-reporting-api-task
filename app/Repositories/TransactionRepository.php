<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use App\Services\FilterFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function __construct(protected readonly FilterFactory $filterFactory)
    {
    }

    public function findByIdWithCustomer(string $transactionId): ?Transaction
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::with('customer')
            ->where('transactionId', $transactionId)
            ->first();

        return $transaction;
    }

    public function getReport(Request $request)
    {
        return Transaction::query()
            ->when($request->input('merchant'),
                fn (Builder $query, $merchantId) => $query->where('merchant_id', $merchantId))
            ->when($request->input('acquirer'),
                fn (Builder $query, $acquirerId) => $query->where('acquirer', $acquirerId))
            ->when($request->input('fromDate'),
                fn (Builder $query, $fromDate) => $query->where('created_at', '>=', $fromDate))
            ->when($request->input('toDate'),
                fn (Builder $query, $toDate) => $query->where('created_at', '<', $toDate))
            ->selectRaw('SUM(amount) AS total, COUNT(*) AS count, currency')
            ->groupBy('currency')
            ->get();
    }

    public function getList(Request $request): LengthAwarePaginator
    {
        return Transaction::query()
            ->select([
                'id',
                'reference_no',
                'status',
                'operation',
                'message',
                'created_at',
                'amount',
                'currency',
                'customer_id',
                'merchant_id',
                'acquirer_id',
            ])
            ->with([
                'customer:id,number,email,billingFirstName,billingLastName',
                'merchant:id,name',
                'acquirer:id,name,code,type',
            ])
            ->when($request->input('fromDate'),
                fn (Builder $query, $fromDate) => $query->where('created_at', '>=', $fromDate))
            ->when($request->input('toDate'),
                fn (Builder $query, $toDate) => $query->where('created_at', '<', $toDate))
            ->when($request->input('status'),
                fn (Builder $query, $status) => $query->where('status', $status))
            ->when($request->input('operation'),
                fn (Builder $query, $operation) => $query->where('operation', $operation))
            ->when($request->input('merchant'),
                fn (Builder $query, $merchantId) => $query->where('merchant_id', $merchantId))
            ->when($request->input('acquirerId'),
                fn (Builder $query, $acquirerId) => $query->where('acquirer_id', $acquirerId))
            ->when($request->input('paymentMethod'),
                fn (Builder $query, $paymentMethod) => $query->where('payment_method', $paymentMethod))
            ->when($request->input('errorCode'),
                fn (Builder $query, $errorCode) => $query->where('code', $errorCode))
            ->when($request->input('filterField'),
                function (Builder $query, $filterField) use ($request) {
                    $filter = $this->filterFactory->make($filterField);

                    $filter->apply($request, $query, $request->input('filterValue'));
                }
            )
            ->paginate();
    }

    public function getDetails(string $transactionId): ?Transaction
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::query()
            ->with(['customer', 'merchant:id,name'])
            ->where('transactionId', $transactionId)
            ->first();

        return $transaction;
    }
}
