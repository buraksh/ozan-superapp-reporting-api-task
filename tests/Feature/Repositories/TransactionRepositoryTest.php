<?php

namespace Tests\Feature\Repositories;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use Illuminate\Http\Request;
use Tests\TestCase;

class TransactionRepositoryTest extends TestCase
{
    /** @test */
    public function it_find_by_id_with_customer(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        /** @var TransactionRepositoryInterface $repository */
        $repository = app(TransactionRepositoryInterface::class);

        $found = $repository->findByIdWithCustomer($transaction->transactionId);

        $this->assertSame($transaction->id, $found->id);
        $this->assertSame($transaction->customer_id, $found->customer_id);
    }

    /** @test */
    public function it_returns_details(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        /** @var TransactionRepositoryInterface $repository */
        $repository = app(TransactionRepositoryInterface::class);

        $found = $repository->getDetails($transaction->transactionId);
        $this->assertSame($transaction->id, $found->id);
        $this->assertSame($transaction->customer_id, $found->customer_id);
        $this->assertSame($transaction->merchant->name, $found->merchant->name);
    }
}
