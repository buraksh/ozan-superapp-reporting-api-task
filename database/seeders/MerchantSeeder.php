<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchant = \App\Models\Merchant::create([
            'name'     => 'Test Merchant',
            'email'    => 'merchant@test.com',
            'password' => bcrypt('12345'),
        ]);

        Transaction::factory()->create([
            'merchant_id'   => $merchant,
            'transactionId' => '1-1444392550-1',
        ]);

        Transaction::factory(5)->create([
            'merchant_id' => $merchant,
        ]);
    }
}
