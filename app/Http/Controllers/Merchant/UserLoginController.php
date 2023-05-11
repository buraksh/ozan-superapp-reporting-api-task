<?php

namespace App\Http\Controllers\Merchant;

use App\Enums\Status;
use App\Exceptions\InvalidCredentialsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserLoginController extends Controller
{
    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(UserLoginRequest $request, MerchantRepositoryInterface $repository): JsonResponse
    {
        return response()->json([
            'token'  => $repository->login($request->validated()),
            'status' => Status::APPROVED,
        ]);
    }
}
