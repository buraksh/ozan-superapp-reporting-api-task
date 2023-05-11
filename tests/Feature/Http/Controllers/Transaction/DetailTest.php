<?php

namespace Tests\Feature\Http\Controllers\Transaction;

use App\Http\Resources\CustomerResource;
use App\Http\Resources\TransactionMerchantResource;
use App\Models\Transaction;
use Tests\TestCase;

class DetailTest extends TestCase
{
    private string $url = '/api/v3/transaction';

    /** @test */
    public function it_requires_authorization(): void
    {
        $this->postJson($this->url)
            ->assertUnauthorized();
    }

    /** @test */
    public function it_validates_request(): void
    {
        $this->actingAsUser()
            ->postJson($this->url)
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'transactionId' => trans('validation.required', ['attribute' => 'transaction id']),
            ]);
    }

    /** @test */
    public function it_handles_invalid_transaction_id(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'transactionId' => 'test',
            ])
            ->assertNotFound()
            ->assertJson([
                'message' => 'Transaction not found',
            ]);
    }

    /** @test */
    public function it_returns_details(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->actingAsUser()
            ->postJson($this->url, [
                'transactionId' => $transaction->transactionId,
            ])
            ->assertOk()
            ->assertJsonFragment([
                'fx' => [
                    'merchant' => [
                        'originalAmount' => $transaction->amount,
                        'originalCurrency' => $transaction->currency,
                    ],
                ],

                'customerInfo' => (new CustomerResource($transaction->customer))->jsonSerialize(),

                'merchant' => [
                    'name' => $transaction->merchant->name,
                ],

                'transaction' => [
                    'merchant' => (new TransactionMerchantResource($transaction))->jsonSerialize(),
                ],
            ]);
    }
}
