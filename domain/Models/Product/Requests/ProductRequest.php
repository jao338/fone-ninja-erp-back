<?php

namespace Base\Models\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'nome' => [
                'required',
                'max:50',
                'min:3',
                'string',
                Rule::unique('product', 'name')->ignore($this->product)
            ],
            'custo_medio' => [
                'required',
                'decimal:2',
                'gt:0',
            ],
            'preco_venda' => [
                'required',
                'decimal:2',
                'gt:0',
            ],
            'quantidade' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
