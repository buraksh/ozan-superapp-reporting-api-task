<?php

namespace App\Repositories\Filters;

use App\Repositories\Contracts\FilterInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CardPanFilter implements FilterInterface
{
    public function apply(Request $request, Builder $query, mixed $value = null): Builder
    {
        return $query->whereHas('customer',
            fn (Builder $q) => $q->where('number', 'LIKE', "%$value%")
        );
    }
}
