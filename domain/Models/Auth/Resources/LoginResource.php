<?php

namespace Base\Models\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'email'            => $this->email,
            'nome'             => $this->name,
            'token'            => $this->getActiveToken(),
        ];
    }
}
