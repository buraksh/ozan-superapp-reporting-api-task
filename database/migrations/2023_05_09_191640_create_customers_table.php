<?php

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->unsignedSmallInteger('expiryMonth');
            $table->unsignedSmallInteger('expiryYear');
            $table->unsignedSmallInteger('startMonth')->nullable();
            $table->unsignedSmallInteger('startYear')->nullable();
            $table->unsignedSmallInteger('issueNumber')->nullable();
            $table->string('email')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('billingTitle')->nullable();
            $table->string('billingFirstName');
            $table->string('billingLastName');
            $table->string('billingCompany')->nullable();
            $table->string('billingAddress1');
            $table->string('billingAddress2')->nullable();
            $table->string('billingCity');
            $table->string('billingPostcode');
            $table->string('billingState')->nullable();
            $table->string('billingCountry');
            $table->string('billingPhone')->nullable();
            $table->string('billingFax')->nullable();
            $table->string('shippingTitle')->nullable();
            $table->string('shippingFirstName');
            $table->string('shippingLastName');
            $table->string('shippingCompany')->nullable();
            $table->string('shippingAddress1');
            $table->string('shippingAddress2')->nullable();
            $table->string('shippingCity');
            $table->string('shippingPostcode');
            $table->string('shippingState')->nullable();
            $table->string('shippingCountry');
            $table->string('shippingPhone')->nullable();
            $table->string('shippingFax')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
