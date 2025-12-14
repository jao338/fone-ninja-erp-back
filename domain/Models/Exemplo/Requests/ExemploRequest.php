<?php

namespace Base\Models\Exemplo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExemploRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'dsc_exemplo' => [
                'required',
            ]
        ];
    }
}
