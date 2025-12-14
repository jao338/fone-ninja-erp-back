<?php

namespace Base\Models\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'cad_e_mail'       => $this->cad_e_mail,
            'cad_razao_social' => $this->cad_razao_social,
            'cad_cnpj'         => $this->cad_cnpj,
            'token'            => $this->getActiveToken(),
        ];
    }
}
