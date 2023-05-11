<?php

namespace Tests\Feature\Models;

use App\Models\Acquirer;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Transaction;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /** @test */
    public function it_belongs_to_customer(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->assertInstanceOf(Customer::class, $transaction->customer);
    }

    /** @test */
    public function it_belongs_to_merchant(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->assertInstanceOf(Merchant::class, $transaction->merchant);
    }

    /** @test */
    public function it_belongs_to_acquirer(): void
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::factory()->create();

        $this->assertInstanceOf(Acquirer::class, $transaction->acquirer);
    }
}
