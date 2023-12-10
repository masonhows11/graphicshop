<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:2', 'max:100'],
            'thumbnail_path' => 'required|image|mimes:jpeg,jpg,png,webp|max:1999',
            'demo_url' => 'required|image|mimes:jpeg,jpg,png,webp|max:1999',
            'source_url' => 'required|mimes:zip|max:1999',
            'description' => ['required', 'min:2','string','max:5000'],
            'categories' => ['required','exists:categories,id'],
            'seo_desc' => ['required', 'min:2','string','max:150'],
            'status' => ['required'],
            'sku' => ['nullable', 'min:1', 'max:30'],
            'price' => ['required', 'gt:0', 'integer'],
            'published_at' => ['required', 'numeric'],
        ];
    }
}
