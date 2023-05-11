<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Transaction */
class TransactionListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(fn (Transaction $model): array => [
            'fx' => [
                'merchant' => [
                    'originalAmount'   => $model->amount,
                    'originalCurrency' => $model->currency,
                ],
            ],

            'customerInfo' => new CustomerResource($model->customer),

            'merchant' => [
                'id'   => $model->merchant_id,
                'name' => $model->merchant->name,
            ],

            'ipn' => [
                'received' => true,
            ],

            'transaction' => [
                'merchant' => new TransactionMerchantShortResource($model),
            ],

            'acquirer' => new AcquirerResource($model->acquirer),

            'refundable' => true,
        ])->all();
    }

    /**
     * Customize the pagination information for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param array                    $paginated
     * @param array                    $default
     *
     * @return array
     */
    public function paginationInformation($request, $paginated, $default)
    {
        $meta = $default['meta'];

        $default['next_page_url'] = $default['links']['next'];
        $default['prev_page_url'] = $default['links']['prev'];

        unset($default['meta'], $default['links'], $meta['links']);

        return $default + $meta;
    }
}
