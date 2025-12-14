<?php

namespace Base\Models\Exemplo\Actions;

use Base\Models\Exemplo\Exemplo;

final readonly class UpdateAction
{

    public function __construct(protected Exemplo $model) {}

    public function handle(string $uuid, array $data): Exemplo
    {
        $exemplo = $this->model->where('uuid', $uuid)->firstOrFail();
        $exemplo->update($data);

        return $exemplo->refresh();
    }
}
