<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TransactionNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Transaction not found',
        ], Response::HTTP_NOT_FOUND);
    }
}
