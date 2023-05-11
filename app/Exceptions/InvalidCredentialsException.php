<?php

namespace App\Exceptions;

use App\Enums\Status;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InvalidCredentialsException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'status' => Status::DECLINED,
        ], Response::HTTP_UNAUTHORIZED);
    }
}
