<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
                'initials' => $this->initials,
                'company' => $this->company,
                'phone' => $this->phone,
                'email' => $this->email,
                'birthday' =>$this->birthday,
                'photo' => $this->photo,
        ];
    }
}
