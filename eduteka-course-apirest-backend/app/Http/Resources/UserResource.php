<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        //limita a quantidade de dados que serão retornados, evitando expor informações sensíveis como senha, tokens, etc.
           return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
    
}
