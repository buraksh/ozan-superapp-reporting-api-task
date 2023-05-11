<?php

use App\Models\Acquirer;
use App\Models\Customer;
use App\Models\Merchant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionId')->unique();
            $table->foreignIdFor(Customer::class)->constrained();
            $table->foreignIdFor(Merchant::class)->constrained();
            $table->foreignIdFor(Acquirer::class)->constrained();
            $table->decimal('amount');
            $table->char('currency', 3);
            $table->string('reference_no')->nullable();
            $table->enum('status', ['WAITING', 'APPROVED', 'DECLINED', 'ERROR']);
            $table->string('payment_method');
            $table->string('channel')->nullable();
            $table->json('custom_data')->nullable();
            $table->string('chain_id')->nullable();
            $table->unsignedBigInteger('agent_info_id')->nullable();
            $table->enum('operation', ['DIRECT', 'REFUND', 'VOID', '3D', '3DAUTH'])->nullable();
            $table->unsignedBigInteger('fx_transaction_id')->nullable();
            $table->unsignedBigInteger('acquirer_transaction_id')->nullable();
            $table->string('code')->nullable();
            $table->string('message')->nullable();
            $table->json('agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
