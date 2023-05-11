<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Transaction */
class TransactionDetailResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fx' => [
                'merchant' => [
                    'originalAmount'   => $this->amount,
                    'originalCurrency' => $this->currency,
                ],
            ],

            'customerInfo' => new CustomerResource($this->customer),

            'merchant' => [
                'name' => $this->merchant->name,
            ],

            'transaction' => [
                'merchant' => new TransactionMerchantResource($this),
            ],
        ];
    }
}
