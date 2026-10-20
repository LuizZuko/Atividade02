<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'descricao' => $this->description,
            'preco' => (float) $this->price,
            'criado_em' => $this->created_at ? $this->created_at->format('d/m/Y H:i:s') : null,
        ];
    }
}