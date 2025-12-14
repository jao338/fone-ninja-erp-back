<?php

namespace Base\Models\Exemplo\Actions;

use Base\Models\Exemplo\Exemplo;

final readonly class ShowAction {

    public function __construct(protected Exemplo $model) {}

    public function handle(string $uuid): ?Exemplo
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
