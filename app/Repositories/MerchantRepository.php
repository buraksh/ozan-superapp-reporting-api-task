<?php

namespace App\Repositories;

use App\Exceptions\InvalidCredentialsException;
use App\Models\Merchant;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class MerchantRepository implements MerchantRepositoryInterface
{
    /**
     * @throws InvalidCredentialsException|\Throwable
     */
    public function login(array $credentials): string
    {
        throw_unless(
            auth()->attempt($credentials),
            InvalidCredentialsException::class
        );

        /** @var Merchant $merchant */
        $merchant = auth()->user();

        // add custom claims. there are here for an example

        return JWTAuth::claims([
            'merchantUserId' => $merchant->merchantUserId,
            'role'           => $merchant->role ?? 'admin',
            'merchantId'     => $merchant->id,
            'subMerchantIds' => [],
        ])->fromUser($merchant);
    }
}
