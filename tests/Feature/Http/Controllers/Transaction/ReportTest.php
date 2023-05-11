<?php

namespace Tests\Feature\Http\Controllers\Transaction;

use App\Enums\Status;
use App\Models\Merchant;
use App\Models\Transaction;
use Tests\TestCase;

class ReportTest extends TestCase
{
    private string $url = '/api/v3/transactions/report';

    /** @test */
    public function it_requires_authorization(): void
    {
        $this->postJson($this->url)
            ->assertUnauthorized();
    }

    /** @test */
    public function it_requires_at_least_one_date(): void
    {
        $this->actingAsUser()
            ->postJson($this->url)
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'fromDate' => trans('validation.required_without', ['attribute' => 'from date', 'values' => 'to date']),
                'toDate' => trans('validation.required_without', ['attribute' => 'to date', 'values' => 'from date']),
            ]);
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
        $this
            ->actingAsUser()
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
                'merchant' => 'test',
            ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'merchant' => trans('validation.integer', ['attribute' => 'merchant']),
            ]);
    }

    /** @test */
    public function it_returns_report()
    {
        /** @var Merchant $merchant */
        $merchant = Merchant::factory()->create();

        /** @var Transaction $transaction1 */
        $transaction1 = Transaction::factory()->create([
            'merchant_id' => $merchant,
            'created_at' => now(),
            'currency' => 'USD',
        ]);

        /** @var Transaction $transaction2 */
        $transaction2 = Transaction::factory()->create([
            'merchant_id' => $merchant,
            'created_at' => now(),
            'currency' => 'TL',
        ]);

        $this->actingAsUser()
            ->postJson($this->url, [
                'fromDate' => fake()->dateTimeBetween('-5 days', '-3 days')->format('Y-m-d'),
                'toDate' => fake()->dateTimeBetween('+1 day', '+7 days')->format('Y-m-d'),
                'merchant' => $merchant->id,
            ])
            ->assertOk()
            ->assertJsonFragment([
                'status' => Status::APPROVED,
            ])
            ->assertJsonFragment([
                'count' => 1,
                'total' => number_format($transaction1->amount, 2),
                'currency' => $transaction1->currency,
            ])->assertJsonFragment([
                'count' => 1,
                'total' => number_format($transaction2->amount, 2),
                'currency' => $transaction2->currency,
            ]);
    }
}
