<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SondageRequest extends FormRequest
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
            'felling_title' => 'required|min:2',
            'content' => 'nullable|min:2',
            'felling' => 'required',
            'programs_id' => 'required'
        ];
    }
}
