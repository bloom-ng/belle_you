<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image_2' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255'],
            'short_description' => ['required', 'max:255', 'string'],
            'sale_price' => ['required', 'numeric'],
            'sale_start' => ['required', 'date'],
            'sale_end' => ['required', 'date'],
            'shipping_fee' => ['required', 'numeric'],
            'slug' => ['required', 'max:255', 'string'],
        ];
    }
}
