<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => [Rule::requiredIf(filled($request->name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user),],
            'first_name' => [Rule::requiredIf(filled($request->first_name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user),],
            'last_name' => [Rule::requiredIf(filled($request->first_name)), 'min:1', 'max:64', 'string', Rule::unique('users')->ignore($request->user),],
        ];
    }
}
