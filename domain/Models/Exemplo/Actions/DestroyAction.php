<?php

namespace Base\Models\Exemplo\Actions;

use Base\Models\Exemplo\Exemplo;

final readonly class DestroyAction {

    public function __construct(protected Exemplo $model) {}

    public function handle(string $uuid): bool
    {
        $exemplo = $this->model->where('uuid', $uuid)->firstOrFail();

        return $exemplo->delete();
    }
}
