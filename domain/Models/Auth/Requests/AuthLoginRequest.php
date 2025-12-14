<?php

namespace Base\Models\Auth\Requests;

use Base\Base\Rules\ExampleRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'cad_e_mail' => [
                'required',
                'email',
                'max:255',
                new ExampleRule()
            ],
            'cad_senha'  => [
                'required',
                'string'
            ]
        ];
    }
}
