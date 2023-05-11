<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
                'required_without:toDate',
                'date_format:Y-m-d',
            ],
            'toDate' => [
                'required_without:fromDate',
                'date_format:Y-m-d',
                'after_or_equal:fromDate',
            ],
            'merchant' => [
                'integer',
            ],
        ];
    }
}
