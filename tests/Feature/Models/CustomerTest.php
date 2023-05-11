<?php

namespace Tests\Feature\Models;

use App\Models\Acquirer;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function it_returns_masked_number(): void
    {
        /** @var Customer $customer */
        $customer = Customer::factory()->make();

        $expected = Str::mask($customer->number, 'X', 6, 6);

        $this->assertSame($expected, $customer->masked_number);
   }
}
