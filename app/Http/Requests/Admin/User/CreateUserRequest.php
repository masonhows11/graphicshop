<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\NationalCode;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required','min:3', 'max:64', 'string'],
            'first_name' => ['required','min:3', 'max:64', 'string'],
            'last_name' => ['required','min:3', 'max:64', 'string'],
            'email' => ['required','email','min:3', 'max:128','unique:users,email'],
            'national_code' => ['required', 'min:1', 'max:10', new NationalCode()],
            'mobile' => ['required','digits:11','unique:users,mobile'],
            'role' => ['required','in:user,admin,seller']
        ];
    }
}
