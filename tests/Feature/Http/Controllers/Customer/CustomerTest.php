<?php

namespace Tests\Feature\Http\Controllers\Customer;

use App\Http\Resources\CustomerResource;
use App\Models\Transaction;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    private string $url = '/api/v3/client';

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
    public function it_returns_customer_data(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->actingAsUser()
            ->postJson($this->url, [
                'transactionId' => $transaction->transactionId,
            ])
            ->assertOk()
            ->assertJsonFragment([
                'customerInfo' => (new CustomerResource($transaction->customer))->jsonSerialize(),
            ]);
    }
}
