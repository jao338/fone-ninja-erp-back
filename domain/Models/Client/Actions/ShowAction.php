<?php

namespace Base\Models\Client\Actions;

use Base\Models\Client\Client;

final readonly class ShowAction {

    public function __construct(protected Client $model) {}

    public function handle(string $uuid): ?Client
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
