<?php

namespace Base\Models\Product\Actions;

use Base\Models\Product\Product;

final readonly class ShowAction {

    public function __construct(protected Product $model) {}

    public function handle(string $uuid): ?Product
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
