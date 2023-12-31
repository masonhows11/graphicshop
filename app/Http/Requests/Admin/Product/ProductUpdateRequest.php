<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required',Rule::unique('products','title')->ignore($this->request->get('product')), 'min:2', 'max:100'],
            'thumbnail_path' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1999',
            'demo_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1999',
            'source_url' => 'nullable |mimes:zip|max:1999',
            'category_id' => 'nullable',
            'description' => ['required', 'min:2','string','max:5000'],
            'categories' => ['required','exists:categories,id'],
            'seo_desc' => ['nullable', 'min:2','string','max:150'],
            'status' => ['required'],
            'sku' => ['nullable', 'min:1', 'max:30'],
            'price' => ['required', 'gt:0', 'integer'],
            'published_at' => ['required', 'numeric'],
        ];
    }
}
