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
     * ),
     * @OA\Property(
     *      property="company",
     *      type="string",
     * ),
     * @OA\Property(
     *      property="phone",
     *      type="string",
     *),
     * @OA\Property(
     *      property="email",
     *      type="string",
     *),
     * @OA\Property(
     *      property="birthday",
     *      type="string",
     *),
     * @OA\Property(
     *      property="photo",
     *      type="string"
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
