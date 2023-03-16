<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Notebook",
 *     description="Notebook model",
 *      @OA\Xml(
 *      name="Notebook"
 *  )
 * )
 *
 */

class Notebook extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *      property="initials",
     *      type="string",
     *      description="Инициалы",
     * ),
     * @OA\Property(
     *      property="company",
     *      type="string",
     *      description="Компания",
     * ),
     * @OA\Property(
     *      property="phone",
     *      type="string",
     *      description="Телефон",
     *),
     * @OA\Property(
     *      property="email",
     *      type="string",
     *      description="Почта",
     *),
     * @OA\Property(
     *      property="birthday",
     *      type="string",
     *      description="Дата рождения",
     *),
     * @OA\Property(
     *      property="photo",
     *      type="string",
     *      description="Фотография",
     *),
     */

    protected $fillable = [
        'initials',
        'company',
        'phone',
        'email',
        'birthday',
        'photo',
    ];

    protected $casts = [
        'birthday' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
