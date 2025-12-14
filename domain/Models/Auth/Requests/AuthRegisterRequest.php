<?php

namespace Base\Models\Auth\Requests;

use Base\Base\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                new PasswordRule($this->input('password')),
            ],
            'confirm_password' => [
                'required',
                'string',
                'min:8',
                'same:password',
            ],
        ];
    }
}
