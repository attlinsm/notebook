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
     * @OA\Items(
     *     @OA\Property(
     *     title="initials",
     *     description="Инициалы",
     *     example="Смирнов Никита Андреевич"
     *  ),
     *     @OA\Property(
     *     title="company",
     *     description="Компания",
     *     example="Future"
     *  ),
     *     @OA\Property(
     *     title="phone",
     *     description="Телефонный номер",
     *     example=88005553535
     *  ),
     *     @OA\Property(
     *     title="email",
     *     description="Почта",
     *     example="example@gmail.com"
     *  ),
     *     @OA\Property(
     *     title="birthday",
     *     description="Дата рождения",
     *     example="1995-04-15T00:00:00.000000Z"
     *  ),
     *     @OA\Property(
     *     title="photo",
     *     description="Фотография",
     *     example="uuid()"
     *  ),
     *)
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
