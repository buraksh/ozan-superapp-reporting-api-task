<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @mixin IdeHelperCustomer
 * @property-read string $masked_number
 */
class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    /**
     * Get the customer's masked number.
     */
    protected function maskedNumber(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::mask($this->number, 'X', 6, 6),
        );
    }
}
