<?php

namespace App\Services;

use App\Repositories\Contracts\FilterInterface;
use App\Repositories\Filters\CardPanFilter;
use App\Repositories\Filters\CustomDataFilter;
use App\Repositories\Filters\CustomerEmailFilter;
use App\Repositories\Filters\ReferenceNoFilter;
use App\Repositories\Filters\TransactionUuidFilter;
use Illuminate\Foundation\Application;

class FilterFactory
{
    public function __construct(protected readonly Application $app)
    {
    }

    public function make(string $field): FilterInterface
    {
        $map = [
            'Transaction UUID' => TransactionUuidFilter::class,
            'Customer Email'   => CustomerEmailFilter::class,
            'Reference No'     => ReferenceNoFilter::class,
            'Custom Data'      => CustomDataFilter::class,
            'Card PAN'         => CardPanFilter::class,
        ];

        return $this->app->make($map[$field]);
    }
}
