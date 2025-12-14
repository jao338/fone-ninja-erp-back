<?php

namespace Base\Models\Exemplo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExemploFilterRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'dsc_exemplo' => [
                'string',
                'max:255',
            ]
        ];
    }
}
