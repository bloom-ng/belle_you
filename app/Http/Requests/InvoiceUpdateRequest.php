<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'line_item' => ['required', 'max:255', 'json'],
            'status' => ['required', 'max:255', 'string'],
            'billed_to_line_1' => ['required', 'max:255', 'string'],
            'billed_to_line_2' => ['required', 'max:255', 'string'],
            'account_name' => ['required', 'max:255', 'string'],
            'account_number' => ['required', 'max:255'],
            'bank_name' => ['required', 'max:255', 'string'],
            'service_charge' => ['required', 'numeric'],
            'vat' => ['required', 'numeric'],
        ];
    }
}
