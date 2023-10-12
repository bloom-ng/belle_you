<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'user_id' => ['required', 'max:255'],
            'name' => ['required', 'max:255', 'string'],
            'payment_ref' => ['required', 'max:255', 'string'],
            'transaction_id' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'discount' => ['required', 'numeric'],
            'payments_status' => ['required', 'in:successful,pending,failed'],
            'payment_response' => ['required', 'max:255', 'string'],
            'order_status' => ['required', 'max:255'],
            'shipping_total' => ['required', 'numeric'],
        ];
    }
}
