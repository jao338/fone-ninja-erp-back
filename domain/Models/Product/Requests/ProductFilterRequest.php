<?php

namespace Base\Models\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'nome' => [
                'string',
                'max:255',
            ],
            'custo_medio' => [
                'integer',
            ],
            'preco_venda' => [
                'integer',
            ],
            'quantidade' => [
                'integer',
            ],
            'criado_em' => [
                'datetime',
            ],
            'atualizado_em' => [
                'datetime',
            ],
        ];
    }
}
