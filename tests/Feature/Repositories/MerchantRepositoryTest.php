<?php

namespace Tests\Feature\Repositories;

use App\Exceptions\InvalidCredentialsException;
use App\Models\Merchant;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use Illuminate\Support\Str;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class MerchantRepositoryTest extends TestCase
{
    /** @test */
    public function it_throws_exception_when_invalid_credentials_are_provided(): void
    {
        /** @var MerchantRepositoryInterface $repository */
        $repository = app(MerchantRepositoryInterface::class);

        $this->expectExceptionObject(new InvalidCredentialsException);
        $repository->login(['email' => 'test', 'password' => 'password']);
    }

    /** @test */
    public function it_returns_token_when_valid_credentials_are_provided(): void
    {
        $password = Str::random();

        /** @var Merchant $merchant */
        $merchant = Merchant::factory()->create([
            'password' => bcrypt($password),
        ]);

        /** @var MerchantRepositoryInterface $repository */
        $repository = app(MerchantRepositoryInterface::class);

        $token = $repository->login(['email' => $merchant->email, 'password' => $password]);

        $data = JWTAuth::setToken($token)->getPayload();

        $this->assertNull($data['merchantUserId']);
        $this->assertSame('admin', $data['role']);
        $this->assertSame($merchant->id, $data['merchantId']);
        $this->assertSame([], $data['subMerchantIds']);
    }
}
