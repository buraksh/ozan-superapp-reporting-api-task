<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\ListRequest;
use App\Http\Resources\TransactionListResource;
use App\Repositories\Contracts\TransactionRepositoryInterface;

class ListController extends Controller
{
    public function __invoke(ListRequest $request, TransactionRepositoryInterface $repository): TransactionListResource
    {
        return new TransactionListResource($repository->getList($request));
    }
}
