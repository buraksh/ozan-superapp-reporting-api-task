<?php

namespace Database\Factories;

use App\Models\Acquirer;
use App\Models\Customer;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transactionId'           => fake()->regexify('\d{1,3}-\d{10}-\d{1}'),
            'merchant_id'             => Merchant::factory()->create(),
            'customer_id'             => Customer::factory()->create(),
            'acquirer_id'             => Acquirer::factory()->create(),
            'amount'                  => fake()->randomFloat(2, 10, 1000),
            'currency'                => rand(0, 1) === 1 ? 'USD' : 'EUR',
            'reference_no'            => 'reference_' . Str::random(13),
            'status'                  => fake()->randomElement(['WAITING', 'APPROVED', 'DECLINED', 'ERROR']),
            'channel'                 => 'API',
            'custom_data'             => null,
            'chain_id'                => Str::random(13),
            'agent_info_id'           => null,
            'operation'               => fake()->randomElement(['DIRECT', 'REFUND', 'VOID', '3D', '3DAUTH']),
            'fx_transaction_id'       => 1,
            'acquirer_transaction_id' => 1,
            'code'                    => '00',
            'message'                 => 'WAITING',
            'agent'                   => [
                'id'                => 1,
                'customerIp'        => fake()->ipv4,
                'customerUserAgent' => fake()->userAgent,
                'merchantIp'        => fake()->ipv4,
            ],
            'payment_method' => 'CREDITCARD',
        ];
    }
}
