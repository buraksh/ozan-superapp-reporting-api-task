<?php

namespace App\Http\Requests\Transaction;

use App\Enums\ErrorCode;
use App\Enums\FilterField;
use App\Enums\Operation;
use App\Enums\PaymentMethod;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fromDate' => [
                'date_format:Y-m-d',
            ],
            'toDate' => [
                'date_format:Y-m-d',
                'after_or_equal:fromDate',
            ],
            'merchantId' => [
                'integer',
            ],
            'status' => [
                new Enum(Status::class),
            ],
            'operation' => [
                new Enum(Operation::class),
            ],
            'paymentMethod' => [
                new Enum(PaymentMethod::class),
            ],
            'errorCode' => [
                new Enum(ErrorCode::class),
            ],
            'filterField' => [
                new Enum(FilterField::class),
            ],
            'page' => [
                'integer',
            ],
        ];
    }
}
