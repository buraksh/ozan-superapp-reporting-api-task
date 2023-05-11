<?php

namespace App\Repositories\Filters;

use App\Repositories\Contracts\FilterInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReferenceNoFilter implements FilterInterface
{
    public function apply(Request $request, Builder $query, mixed $value = null): Builder
    {
        return $query->where('reference_no', $value);
    }
}
