<?php

namespace Base\Models\Exemplo\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExemploResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'exemplo' => $this->dsc_exemplo,
        ];
    }
}
