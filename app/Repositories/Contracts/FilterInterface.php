<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface FilterInterface
{
    public function apply(Request $request, Builder $query, mixed $value = null);
}
