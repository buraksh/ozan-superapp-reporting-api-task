<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Transaction */
class TransactionMerchantShortResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'referenceNo'   => $this->reference_no,
            'status'        => $this->status,
            'operation'     => $this->operation,
            'message'       => $this->message,
            'created_at'    => $this->created_at,
            'transactionId' => $this->transactionId,
        ];
    }
}
