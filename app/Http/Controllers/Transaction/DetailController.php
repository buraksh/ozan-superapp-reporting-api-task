<?php

namespace App\Http\Controllers\Transaction;

use App\Exceptions\TransactionNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\DetailRequest;
use App\Http\Resources\TransactionDetailResource;
use App\Repositories\Contracts\TransactionRepositoryInterface;

class DetailController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function __invoke(DetailRequest $request, TransactionRepositoryInterface $repository): TransactionDetailResource
    {
        $transaction = $repository->getDetails($request->input('transactionId'));

        throw_unless($transaction, TransactionNotFoundException::class);

        return new TransactionDetailResource($transaction);
    }
}
