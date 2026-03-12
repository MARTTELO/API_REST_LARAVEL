<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        /* retorna os dados da coleção de usuários e inclui informações adicionais, como o total de usuários cadastrados no sistema. 
        Isso é útil para fornecer contexto adicional ao cliente que consome a API, permitindo que ele saiba quantos usuários existem no total, 
        mesmo que a resposta atual contenha apenas uma parte dos usuários devido à paginação ou outros filtros aplicados.               
         */
        $totalUsers = User::count();
         return [
            'data' => $this->collection,
            'infos' => [
                'total_users' => $totalUsers,
            ],
        ];
    }
}
