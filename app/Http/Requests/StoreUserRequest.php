<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => ['required', 'min:2', 'regex:/^[a-z A-Z]+$/'],
            'last_name' => ['required', 'min:2','regex:/^[a-z A-Z]+$/'],
            'email' => ['required','unique:users'],
            'age' => ['required', 'regex:/^[0-9]+$/'],
            'role' => ['required'],
            'password' => ['required', 'min:4']
        ];

    }
}
