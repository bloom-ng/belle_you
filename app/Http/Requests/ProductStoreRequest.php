<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'image' => ['required', 'image', 'max:1024'],
            'image_2' => ['nullable', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'type' => ['required', 'in:ready_made,custom'],
            'short_description' => ['nullable', 'max:255', 'string'],
            'shipping_fee' => ['required', 'numeric'],
            'sale_price' => ['nullable', 'numeric'],
            'sale_start' => ['nullable', 'date'],
            'sale_end' => ['nullable', 'date'],
            'slug' => ['required', 'max:255', 'string'],
        ];
    }
}
