<?php

namespace Base\Models\Shopping\Actions;

use Base\Models\Shopping\Shopping;

final readonly class ShowAction {

    public function __construct(protected Shopping $model) {}

    public function handle(string $uuid): ?Shopping
    {
        return $this->model
            ->with(['shoppingItems', 'supplier'])
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
