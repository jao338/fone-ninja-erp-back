<?php

namespace Base\Models\Exemplo\Actions;

use Base\Models\Exemplo\Exemplo;

final readonly class CreateAction
{

    public function __construct(protected Exemplo $model) { }

    public function handle(array $data): Exemplo
    {
        return $this->model->create($data);
    }
}
