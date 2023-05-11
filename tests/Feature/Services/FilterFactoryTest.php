<?php

namespace Tests\Feature\Services;

use App\Enums\FilterField;
use App\Repositories\Filters\CardPanFilter;
use App\Repositories\Filters\CustomDataFilter;
use App\Repositories\Filters\CustomerEmailFilter;
use App\Repositories\Filters\ReferenceNoFilter;
use App\Repositories\Filters\TransactionUuidFilter;
use App\Services\FilterFactory;
use Tests\TestCase;

class FilterFactoryTest extends TestCase
{
    /** @test */
    public function it_creates_filter_instance(): void
    {
        /** @var FilterFactory $factory */
        $factory = app(FilterFactory::class);

        $this->assertInstanceOf(CardPanFilter::class, $factory->make(FilterField::CARD_PAN->value));
        $this->assertInstanceOf(CustomDataFilter::class, $factory->make(FilterField::CUSTOM_DATA->value));
        $this->assertInstanceOf(CustomerEmailFilter::class, $factory->make(FilterField::CUSTOMER_EMAIL->value));
        $this->assertInstanceOf(ReferenceNoFilter::class, $factory->make(FilterField::REFERENCE_NO->value));
        $this->assertInstanceOf(TransactionUuidFilter::class, $factory->make(FilterField::TRANSACTION_UUID->value));
    }
}
