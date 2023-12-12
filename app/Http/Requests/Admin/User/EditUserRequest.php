<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\NationalCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            'name' => ['nullable', 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($this->request->get('id')),],
            'first_name' => ['nullable', 'min:1', 'max:64', 'string'],
            'last_name' => ['nullable', 'min:1', 'max:64', 'string'],
            'email' => ['required','email','min:3', 'max:128',Rule::unique('users')->ignore($this->request->get('id'))],
            'national_code' => ['required', 'min:1', 'max:10', new NationalCode(),Rule::unique('users')->ignore($this->request->get('id'))],
            'mobile' => ['required','digits:11',Rule::unique('users')->ignore($this->request->get('id'))],
            'role' => ['required','in:user,admin,seller']
        ];
    }
}
