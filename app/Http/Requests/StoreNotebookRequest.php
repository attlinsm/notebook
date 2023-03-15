<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotebookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'initials' => ['required', 'string'],
            'company' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email'],
            'birthday' => ['nullable', 'date'],
            'photo' => ['nullable', 'string'],
        ];
    }
}
