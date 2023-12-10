<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCategoryRequest extends FormRequest
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
            'title' => ['required',Rule::unique('categories','title')->ignore($this->request->get('id')), 'min:2', 'max:30'],
            'slug' => ['required',Rule::unique('categories','slug')->ignore($this->request->get('id')),'min:2', 'max:30'],
            'status' => ['required'],
            'image_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ];
    }
}
