<?php

namespace Tests\Feature\Http\Controllers\Transaction;

use App\Enums\Status;
use App\Http\Resources\AcquirerResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\TransactionMerchantShortResource;
use App\Models\Transaction;
use Tests\TestCase;

class ListTest extends TestCase
{
    private string $url = '/api/v3/transaction/list';

    /** @test */
    public function it_requires_authorization(): void
    {
        $this->postJson($this->url)
            ->assertUnauthorized();
    }

    /** @test */
    public function it_validates_from_date_format(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'fromDate' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'fromDate' => trans('validation.date_format', ['attribute' => 'from date', 'format' => 'Y-m-d']),
            ]);
    }

    /** @test */
    public function it_validates_to_date_format(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'toDate' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'toDate' => trans('validation.date_format', ['attribute' => 'to date', 'format' => 'Y-m-d']),
            ]);
    }

    /** @test */
    public function it_validates_to_date_to_be_after_or_equal_from_date(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'fromDate' => fake()->dateTimeInInterval('-1 day')->format('Y-m-d'),
                'toDate' => fake()->dateTimeInInterval('-1 week')->format('Y-m-d'),
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'toDate' => trans('validation.after_or_equal', ['attribute' => 'to date', 'date' => 'from date']),
            ]);
    }

    /** @test */
    public function it_requires_integer_merchant(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'merchantId' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'merchantId' => trans('validation.integer', ['attribute' => 'merchant id']),
            ]);
    }

    /** @test */
    public function it_validates_status(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'status' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'status' => trans('validation.enum', ['attribute' => 'status']),
            ]);
    }

    /** @test */
    public function it_validates_operation(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'operation' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'operation' => trans('validation.enum', ['attribute' => 'operation']),
            ]);
    }

    /** @test */
    public function it_validates_payment_method(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'paymentMethod' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'paymentMethod' => trans('validation.enum', ['attribute' => 'payment method']),
            ]);
    }

    /** @test */
    public function it_validates_error_code(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'errorCode' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'errorCode' => trans('validation.enum', ['attribute' => 'error code']),
            ]);
    }

    /** @test */
    public function it_validates_filter_field(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'filterField' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'filterField' => trans('validation.enum', ['attribute' => 'filter field']),
            ]);
    }

    /** @test */
    public function it_requires_integer_page(): void
    {
        $this->actingAsUser()
            ->postJson($this->url, [
                'page' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'page' => trans('validation.integer', ['attribute' => 'page']),
            ]);
    }

    /** @test */
    public function it_returns_list()
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->actingAsUser()
            ->postJson($this->url, [
                'merchantId' => $transaction->merchant_id,
            ])
            ->assertOk()
            ->assertJsonFragment([
                'fx' => [
                    'merchant' => [
                        'originalAmount' => number_format($transaction->amount, 2),
                        'originalCurrency' => $transaction->currency,
                    ],
                ],

                'merchant' => [
                    'id' => $transaction->merchant_id,
                    'name' => $transaction->merchant->name,
                ],
            ]);
    }
}
