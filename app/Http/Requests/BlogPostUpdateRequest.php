<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'string'],
            'author' => ['required', 'exists:users,id'],
            'description' => ['required', 'max:255', 'string'],
            'content' => ['required', 'max:255', 'string'],
            'featured_image' => ['required', 'max:255', 'string'],
            'is_featured' => ['required', 'boolean'],
            'meta' => ['required', 'max:255', 'json'],
            'blog_category_id' => ['required', 'exists:blog_categories,id'],
        ];
    }
}
