<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="StoreNotebookRequest",
 *      description="StoreNotebookRequest data",
 *      type="object",
 *      required={"initials", "phone", "email"}
 * )
 */

class StoreNotebookRequest extends FormRequest
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
