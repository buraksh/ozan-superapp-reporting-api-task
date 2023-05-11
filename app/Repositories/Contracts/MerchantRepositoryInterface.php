<?php

namespace App\Repositories\Contracts;

use App\Exceptions\InvalidCredentialsException;

interface MerchantRepositoryInterface
{
    /**
     * @throws InvalidCredentialsException
     */
    public function login(array $credentials): string;
}
