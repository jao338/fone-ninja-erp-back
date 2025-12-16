<?php

namespace Base\Models\Shopping\Resources;

use Base\Models\ShoppingItem\Resources\ShoppingItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'uuid'         => $this->uuid,
            'total'        => $this->total,
            'fornecedor'   => $this->supplier?->name,
            'items'        => ShoppingItemResource::collection($this->shoppingItems),
        ];
    }
}
