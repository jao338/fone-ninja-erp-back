<?php

namespace Base\Base\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExampleRule implements ValidationRule {

    public function __construct() {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! str_ends_with($value, '.com') || ! str_ends_with($value, '.com.br')) {
            $fail('validation.invalid_request')->translate();
        }
    }

}
