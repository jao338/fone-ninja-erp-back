<?php

namespace Base\Models\Sale\Actions;

use Base\Models\Sale\Sale;

final readonly class ShowAction {

    public function __construct(protected Sale $model) {}

    public function handle(string $uuid): ?Sale
    {
        return $this->model
            ->with(['saleItems', 'client'])
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
