<?php

namespace App\Http\Controllers\Customer;

use App\Exceptions\TransactionNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function __invoke(CustomerRequest $request, TransactionRepositoryInterface $repository): CustomerResource|JsonResponse
    {
        $transaction = $repository->findByIdWithCustomer($request->string('transactionId'));

        throw_unless($transaction, TransactionNotFoundException::class);

        return new CustomerResource($transaction->customer);
    }
}
