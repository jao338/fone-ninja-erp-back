<?php

namespace Base\Models\Sale\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleFilterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'total' => [
              'numeric'
            ],
            'criado_em' => [
                'datetime',
            ],
            'atualizado_em' => [
                'datetime',
            ],
            'ativo' => [
                'boolean',
            ],
            'lucro' => [
                'numeric',
            ],
        ];
    }
}
