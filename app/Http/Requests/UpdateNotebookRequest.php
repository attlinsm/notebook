<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="UpdateNotebookRequest",
 *      description="UpdateNotebookRequest data",
 *      type="object",
 * )
 */

class UpdateNotebookRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      property="initials",
     *      description="Инициалы",
     * ),
     * @OA\Property(
     *      property="company",
     *      description="Компания",
     * ),
     * @OA\Property(
     *      property="phone",
     *      description="Телефон",
     *),
     * @OA\Property(
     *      property="email",
     *      description="Почта",
     *),
     * @OA\Property(
     *      property="birthday",
     *      description="Дата рождения",
     *),
     * @OA\Property(
     *      property="photo",
     *      description="Фотография"
     *),
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
            'initials' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email'],
            'birthday' => ['nullable', 'date'],
            'photo' => ['nullable', 'string'],
        ];
    }
}
